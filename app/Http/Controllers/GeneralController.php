<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Item;
use App\Models\JoinBid;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->select('items.id')
            ->where([
                'items.item_id' => $id_item,
                'users.username' => $username,
            ])
            ->get();
        if (count($cekdata) == 1) {
            // get data of item
            $data = DB::table('items')
                ->join('users', 'items.seller_id', 'users.id')
                ->join('brands', 'items.brand', 'brands.id')
                ->join('categories', 'items.category', 'categories.id')
                ->select([
                    'items.*',
                    'users.username',
                    'users.id',
                    'brands.name as brand_name',
                    'categories.name as category_name'
                ])
                ->where([
                    'items.item_id' => $id_item,
                    'users.username' => $username,
                ])
                ->get();
            // get data of item's offers
            $datapenawaran = DB::table('offers')
                ->join('users', 'offers.id_seller', 'users.id')
                ->join('items', 'offers.id_item', 'items.item_id')
                ->select('offers.*')
                ->where([
                    'items.item_id' => $id_item
                ])
                ->orderBy('offer_price', 'desc')
                ->get()
                ->all();
            // get data of join bidding status
            // check if user has make an offer
            if (isset(Auth::user()->id)) {
                $datajoinbid = JoinBid::where([
                    'user_id' => Auth::user()->id,
                    'item_id' => $cekdata[0]->id,
                ])->get();
            } else {
                $datajoinbid = null;
            }
        } elseif (count($cekdata) > 1) {
            Alert::alert('Aww Crap!', 'Terjadi kesalahan ketika membuka halaman item!', 'danger');
            return redirect(route('page.landing'));
        } else {
            Alert::alert('Aww Crap!', 'Data yang akan dibuka tidak tersedia!', 'danger');
            return redirect(route('page.landing'));
        }
        return view('general.view_item', [
            'item' => $data,
            'penawaran' => $datapenawaran,
            'statusjoin' => $datajoinbid,
        ]);
    }

    public function viewuser($username)
    {
        echo $username;
        if ($username == 'status-lelang') {
            return redirect(route('cart'));
        }
    }

    public function mostviewed()
    {
        return view('general.most-viewed');
    }

    public function brand()
    {
        return view('general.brand');
    }

    public function viewbrand($name)
    {
        $data = Brand::where('name', $name)->get();
        dd($data);
    }

    public function category()
    {
        return view('general.category');
    }

    public function viewcategory()
    {
        echo 'view tipe';
    }
}
