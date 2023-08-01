<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\InvoiceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    function send_notification() {
        // $admins = User::where('type', 'admin')->get();
        // $admins = User::whereType('admin')->get();
        // Notification::send($admins, new InvoiceNotification);

        $data = [
            'user' => 'Mohammed Naji',
            'product' => 'iPhone',
            'price' => 1000
        ];

        // Artisan::call("queue:work");
        $user = User::find(1);
        $user->notify(new InvoiceNotification($data));
        // Artisan::call("queue:stop");
        // dd($admins);
    }

    function all_notification() {
        $user = User::find(1);

        return view('all_notification', compact('user'));
    }

    function read_notification($id) {
        $user = User::find(1);
        $user->notifications()->find($id)->markAsRead();

        return [
            'msg' => 'Done'
        ];
        // return redirect()->back();
    }
}
