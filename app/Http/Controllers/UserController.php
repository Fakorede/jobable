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
        $this->validate($request, [
            'address' => 'required',
            'bio' => 'required|min:20',
            'experience' => 'required|min:20',
            'phone_number' => 'required|regex:/^[0]\d{10}$/',
        ]);

        $user_id = auth()->user()->id;

        Profile::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'experience' => $request->experience,
            'bio' => $request->bio,
        ]);

        return redirect()->back()->with('message', 'Profile Successfully Updated!');
    }

    public function coverletter(Request $request)
    {
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/cv');

        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover,
        ]);

        return redirect()->back()->with('message', 'Cover Letter Successfully Updated!');
    }

    public function resume(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/resume');

        Profile::where('user_id', $user_id)->update([
            'resume' => $resume,
        ]);

        return redirect()->back()->with('message', 'Resume Successfully Updated!');
    }

    public function avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/avatar/', $filename);

            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename,
            ]);

            return redirect()->back()->with('message', 'Profile Picture Successfully Updated!');
        }

    }
}
