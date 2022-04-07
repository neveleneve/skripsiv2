<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GeneralController extends Controller
{
    public function landing()
    {
        // $item = Item::orderBy('created_at', 'desc')->get();
        $item = DB::table('items')
            ->join('users', 'items.seller_id', 'users.id')
            ->select('items.*', 'users.username')
            ->get();
        return view('general.welcome', [
            'items' => $item
        ]);
    }
    public function viewitem($username, $id_item)
    {
        // cek jika item tersedia
        $cekdata = DB::table('items')
            ->join('users', 'items.seller_id', 'users.id')
            ->where([
                'items.item_id' => $id_item,
                'users.username' => $username,
            ])
            ->count();
        if ($cekdata == 1) {
            $data = DB::table('items')
                ->join('users', 'items.seller_id', 'users.id')
                ->join('brands', 'items.brand', 'brands.id')
                ->join('categories', 'items.category', 'categories.id')
                ->select('items.*', 'users.username', 'brands.name as brand_name', 'categories.name as category_name')
                ->where([
                    'items.item_id' => $id_item,
                    'users.username' => $username,
                ])
                ->get();
            $datapenawaran = DB::table('offers')
                ->join('users', 'offers.id_seller', 'users.id')
                ->join('items', 'offers.id_item', 'items.item_id')
                ->select('offers.*')
                ->where([
                    'items.item_id' => $id_item,
                    'users.username' => $username,
                ])
                ->get();
                // dd($datapenawaran);
        } elseif ($cekdata > 1) {
            Alert::alert('Aww Crap!', 'Terjadi kesalahan ketika membuka halaman item!', 'danger');
            return redirect(route('landing-page'));
        } else {
            Alert::alert('Aww Crap!', 'Data yang akan dibuka tidak tersedia!', 'danger');
            return redirect(route('landing-page'));
        }
        return view('general.view_item', [
            'item' => $data,
            'penawaran' => $datapenawaran,
        ]);
    }
    public function viewuser($username)
    {
        echo $username;
    }
    public function mostviewed()
    {
        return view('general.most-viewed');
    }
    public function brand()
    {
        return view('general.brand');
    }
    public function category()
    {
        return view('general.category');
    }
}
