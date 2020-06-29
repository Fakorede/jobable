<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerRegistrationController extends Controller
{
    public function register(Request $request)
    {

        $this->validate($request, [
            'cname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => $request->cname,
            'slug' => Str::slug($request->cname),
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->to('login')->with('message', 'Registration Successful! A verification link had been sent to your e-mail address!');
    }
}
