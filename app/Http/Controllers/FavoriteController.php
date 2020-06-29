<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function save($id)
    {
        $job = Job::findOrFail($id);
        $user = Auth::user()->id;

        $job->favorites()->attach($user);
        return redirect()->back();
    }

    public function unsave($id)
    {
        $job = Job::findOrFail($id);
        $user = Auth::user()->id;

        $job->favorites()->detach($user);
        return redirect()->back();
    }
}
