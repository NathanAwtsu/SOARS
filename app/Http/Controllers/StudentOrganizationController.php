<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentOrganization;

class StudentOrganizationController extends Controller
{
    public function index()
    {
        
    }


    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'organizationName' => 'required', 
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('logos'), $fileName);

            $organization = new StudentOrganization();
            $organization->name = $request->input('organizationName'); // Store organization name
            $organization->logo = $fileName; // Store logo file name/path
            // Set other attributes if needed
            $organization->save();

            return redirect()->back()->with('success', 'Logo uploaded successfully.');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }
}


