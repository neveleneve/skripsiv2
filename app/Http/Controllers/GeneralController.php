<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function landing()
    {
        // $item = Item::orderBy('created_at', 'desc')->get();
        $item = DB::table('items')
            ->join('users', 'items.seller_id', 'users.id')
            ->select('items.*', 'users.username')
            ->get();
        return view('generalauth.welcome', [
            'items' => $item
        ]);
    }
    public function viewitem($id_item)
    {
        echo $id_item;
    }
    public function viewuser($username)
    {
        echo $username;
    }
    public function mostviewed()
    {
        return view('generalauth.most-viewed');
    }
    public function brand()
    {
        return view('generalauth.brand');
    }
    public function category()
    {
        return view('generalauth.category');
    }
}
