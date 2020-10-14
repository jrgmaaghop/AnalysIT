<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function app()
    {
        return response()->json([
            'status' => 'success',
            'base_url' => url('/')
        ], 200);
    }
}
