<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('user.status_lelang', [
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
            return view('user.view_status_lelang', [
                'data' => $datapenawaran,
            ]);
        } else {
            # code...
            echo 'tidak pas';
        }
    }
    public function ikutlelang(Request $data)
    {
        // dd($data->all());
        // check if user have done the proccess
        if (Auth::check()) {
            if ($data->nama_penjual == Auth::user()->username) {
                Alert::alert('Aww Crap!', 'Kamu merupakan penjual item ini!', 'danger');
                return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
            } else {
                $checkdata = Offer::where([
                    'id_item' => $data->item_id,
                    'id_penawar' => $data->user_id,
                ])->get();
                if (count($checkdata) > 0) {
                    Alert::alert('Aww Crap!', 'Kamu sudah melakukan penawaran di item ini!', 'danger');
                    return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
                } else {
                    $tanggal = date('Y-m-d H:i:s');
                    $previous = null;
                    $checkdataterakhir = Offer::where([
                        'id_item' => $data->item_id,
                        'id_seller' => $data->id_penjual,
                    ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    if (count($checkdataterakhir) != 0) {
                        $previous = $checkdataterakhir[0]['offer_code'];
                    }
                    $offer_code = [
                        'previous_offer_code' => null,
                        'id_penawar' => $data->user_id,
                        'id_seller' => $data->id_penjual,
                        'id_item' => $data->item_id,
                        'offer_price' => $data->harga,
                        'offer_type' => $data->jenis,
                        'created_at' => $tanggal,
                    ];
                    print_r($offer_code);
                    echo(hash('md2', serialize($offer_code)));
                }
            }
        } else {
            Alert::alert('Aww Crap!', 'Kamu harus masuk untuk melakukan transaksi ini!', 'danger');
            return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
        }
    }
}
