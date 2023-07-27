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

        Artisan::call("queue:work");
        $user = User::find(1);
        $user->notify(new InvoiceNotification());
        Artisan::call("queue:stop");
        // dd($admins);
    }
}
