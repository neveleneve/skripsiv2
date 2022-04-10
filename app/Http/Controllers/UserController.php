<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $data = Offer::where('id_penawar', Auth::user()->id)->get();
        return view('user.status-lelang', [
            'data' => $data,
            'no' => 1,
        ]);
    }
    public function viewstatus($offer_code)
    {
        $cekdata = Offer::where('offer_code', $offer_code)->get('id_penawar');
        if ($cekdata[0]['id_penawar'] === Auth::user()->id) {
            $datapenawaran = DB::table('offers')
                ->join('users', 'offers.id_seller', 'users.id')
                ->join('items', 'offers.id_item', 'items.item_id')
                ->select('offers.*')
                ->where(['offers.offer_code' => $offer_code])
                ->get();
            echo 'pas';
        }else {
            # code...
            echo 'tidak pas';
        }
    }
}
