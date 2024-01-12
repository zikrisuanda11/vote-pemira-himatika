<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function success($data, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $code);
    }

    public function error($message, $code)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}
