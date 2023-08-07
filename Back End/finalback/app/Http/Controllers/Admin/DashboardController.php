<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    function dashboard() {
        return view('admin.dashboard');
    }

    function account() {
        return view('admin.account');
    }

    function account_update (Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'nullable|confirmed'
        ]);

        if($request->has('old_password') && $request->old_password) {
            if(!Hash::check($request->old_password, Auth::user()->password)) {
                return redirect()
                ->back()
                ->with('err_old', 'Old password not match');
            }
        }

        $data = $request->only('name');

        if($request->has('password') && $request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $admin = Auth::user();
        /** @var Admin $admin */
        $admin->update($data);

        // firstOrCreate
        if($request->hasFile('image')) {
            File::delete(public_path($admin->image));
            $path = $request->file('image')->store('images', 'files');
            $admin->image()->updateOrCreate([
                'path' => $path,
                'type' => 'cover'
            ]);
        }

        return redirect()
                ->back()
                ->with('success', 'Account updated');

    }

    function settings() {
        return view('admin.settings');
    }

    function settings_update(Request $request) {
        // dd($request->all());
        if($request->hasFile('site_logo')) {
            $site_logo = $request->file('site_logo')->store('images', 'files');
        }

        settings([
            'site_name' => $request->site_name,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright,
            'site_logo' => $site_logo??'',
        ]);

        return redirect()->back()->with('msg', 'Settings saved');
    }
}
