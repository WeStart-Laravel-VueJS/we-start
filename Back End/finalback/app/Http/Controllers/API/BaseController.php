<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    function message($data, $msg = '', $status = true, $code = 200) {
        return response()->json([
            'status' => $status,
            'message' => $msg,
            'data' => $data
        ], $code);
    }
}
