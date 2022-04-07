<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    public function profile()
    {
    }
    public function setting()
    {
    }
    public function penawaran($username, $id_item)
    {
        echo 'penawaran barang lelang dari item ' . $id_item . ' oleh ' . $username;
    }
}
