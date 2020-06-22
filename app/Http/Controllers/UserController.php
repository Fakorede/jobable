<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        Profile::where('user_id', $user_id)->update([
            'address' => $request->address,
            'experience' => $request->experience,
            'bio' => $request->bio,
        ]);

        return redirect()->back()->with('message', 'Profile Successfully Updated!');
    }

    public function coverletter(Request $request)
    {
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/cv');

        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);

        return redirect()->back()->with('message', 'Cover Letter Successfully Updated!');
    }

    public function resume(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/resume');

        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);

        return redirect()->back()->with('message', 'Resume Successfully Updated!');
    }

    public function avatar(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('uploads/avatar/', $filename);

            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);
    
            return redirect()->back()->with('message', 'Profile Picture Successfully Updated!');
        }

    }
}
