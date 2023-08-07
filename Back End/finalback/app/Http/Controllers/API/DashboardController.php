<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    function settings() {

        $data = [
            'site_name' => settings('site_name'),
            'site_logo' => asset(settings('site_logo')),
        ];

        return $this->message($data, 'All Site Settings');
    }
}
