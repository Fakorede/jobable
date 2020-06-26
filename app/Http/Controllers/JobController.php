<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer', ['except' => array('index', 'show', 'apply')]);
    }

    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function myjobs()
    {
        $user_id = auth()->user()->id;
        $jobs = Job::where('user_id', $user_id)->get();
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
}
