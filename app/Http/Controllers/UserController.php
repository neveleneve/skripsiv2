<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user']);
    }

    public function favorite()
    {
        return view('user.liked');
    }

    public function status()
    {
        return view('user.status-lelang');
    }
    public function viewstatus()
    {
        # code...
    }
}
