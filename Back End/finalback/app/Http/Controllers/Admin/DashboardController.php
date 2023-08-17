<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ReplyMail;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    function services() {
        $services = Service::with('category', 'user', 'image')->latest('id')->paginate(10);
        return view('admin.services', compact('services'));
    }

    function reports() {
        $reports = Report::with('user', 'service')->latest('id')->paginate(10);
        return view('admin.reports', compact('reports'));
    }

    function reports_replay(Request $request, $id) {

        $request->validate([
            'reply' => 'required'
        ]);

        $report = Report::find($id);

        Mail::to($report->user->email)->queue(new ReplyMail($request->reply, $report->user->name));

        $report->update([
            'status' => '1',
            'reply' => $request->reply,
            'admin_id' => Auth::id()
        ]);

        return redirect()->back();

    }

    function payments() {
        $payments = Payment::with('user')->latest('id')->paginate(10);

        return view('admin.payments', compact('payments'));
    }
}
