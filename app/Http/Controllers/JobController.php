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
    public function index()
    {
        $jobs = Job::all();
        return view('welcome', compact('jobs'));
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
}
