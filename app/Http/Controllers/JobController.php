<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\JobPostRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'apply', 'alljobs', 'search')]);
    }

    public function index()
    {
        $jobs = Job::latest()
            ->limit(10)
            ->where('status', 1)
            ->get();

        $companies = Company::get();
        if (!$companies->isEmpty() && $companies->count() > 4) {
            $companies = $companies->random(4);
        }

        return view('jobs.index', compact('jobs', 'companies'));
    }

    public function alljobs(Request $request)
    {

        $position = $request->get('position');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        if ($position || $type || $category || $address) {
            $jobs = Job::where('position', 'LIKE', '%' . $position . '%')
                ->where('type', 'LIKE', '%' . $type . '%')
                ->where('category_id', 'LIKE', '%' . $category . '%')
                ->where('address', 'LIKE', '%' . $address . '%')
                ->paginate(10);

        } else {
            $jobs = Job::latest()
                ->where('status', 1)
                ->paginate(10);
        }

        return view('jobs.alljobs', compact('jobs'));

    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $jobs = Job::where('position', 'LIKE', '%' . $keyword . '%')
            ->orWhere('title', 'LIKE', '%' . $keyword . '%')
            ->limit(10)
            ->get();

        return response()->json($jobs);
    }

    public function myjobs()
    {
        $user_id = auth()->user()->id;
        $jobs = Job::latest()->where('user_id', $user_id)->paginate(5);
        return view('jobs.myjobs', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {
        $user_id = Auth::user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;

        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'roles' => $request->roles,
            'category_id' => $request->category,
            'position' => $request->position,
            'address' => $request->address,
            'type' => $request->type,
            'salary' => $request->salary,
            'status' => $request->status,
            'last_date' => $request->last_date,
        ]);

        return redirect()->back()->with('message', 'Job Successfully Posted!');
    }

    public function edit(Job $job)
    {
        return view("jobs.edit", compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job Successfully Updated!');
    }

    public function apply(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->users()->attach(Auth::user()->id);

        //     DB::table('job_users')->create([
        //         'user_id'=>Auth::user()->id,
        //          'job_id'=>$id
        //    ]);

        return redirect()->back()->with('message', 'Application Successfully Submitted!');
    }

    public function applications()
    {
        $applications = Job::has('users')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('jobs.applications', compact('applications'));
    }
}
