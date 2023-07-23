<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function contact_us() {
        return view('contact_us');
    }

    function contact_us_data(Request $request) {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'cv' => 'required',
            'message' => 'required',
        ]);

        // upload file
        $cv_name = str_replace(' ', '-', strtolower($request->name)) . '-' . date('d-m-Y').'-'.time().'.'.$request->file('cv')->getClientOriginalExtension();
        $request->file('cv')->move(public_path('cv'), $cv_name);

        $data = $request->except('_token', 'cv');
        $data['cv'] = $cv_name;
        // send email
        Mail::to('malqumbuz@gmail.com')->send(new ContactUsMail($data));

        // redirect
    }
}
