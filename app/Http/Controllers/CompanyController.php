<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function show()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required|regex:/^[0]\d{10}$/',
            'website' => 'required',
            'slogan' => '',
            'description' => 'required|min:10',
        ]);

        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'slogan' => $request->slogan,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'Company Information Successfully Updated!');
    }

    public function coverphoto(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('cover_photo')) {
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/coverimage/', $filename);

            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename,
            ]);

            return redirect()->back()->with('message', 'Cover Image Successfully Updated!');
        }
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo/', $filename);

            Company::where('user_id', $user_id)->update([
                'logo' => $filename,
            ]);

            return redirect()->back()->with('message', 'Logo Successfully Updated!');
        }
    }
}
