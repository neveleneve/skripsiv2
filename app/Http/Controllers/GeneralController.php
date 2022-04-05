<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function mostviewed()
    {
        return view('most-viewed');
    }
    public function brand()
    {
        return view('brand');
    }
    public function category()
    {
        return view('category');
    }
}
