<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\JoinBid;
use App\Models\Offer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        $data = Offer::where('id_penawar', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.status_lelang', [
            'data' => $data,
            'no' => 1,
        ]);
    }

    public function viewstatus($offer_code)
    {
        // $offercode = str_replace('-', '', $offer_code);
        // $cekdata = Offer::where('offer_code', $offercode)->get([
        //     'id_penawar',
        //     'offer_type',
        //     'id_item',
        //     'payment_url',
        //     'order_status',
        //     'order_id',
        //     'id'
        // ]);
        // if (count($cekdata) == 1) {
        //     $endpoint = "https://api.sandbox.midtrans.com/v2/" . $cekdata[0]->order_id . "/status";
        //     $client = new \GuzzleHttp\Client([
        //         'headers' => [
        //             'Accept' => 'application/json',
        //             'Content-Type' => 'application/json',
        //             'Authorization' => 'Basic ' . base64_encode(env('MIDTRANS_SERVER_KEY')),
        //         ]
        //     ]);
        //     $response = $client->request('GET', $endpoint);
        //     $content = json_decode($response->getBody(), true);
        //     // dd($content);
        //     if ($cekdata[0]['id_penawar'] === Auth::user()->id) {
        //         if ($content['status_code'] === "404" || $content['status_code'] === "202") {
        //             if ($cekdata[0]->order_status === 'cancel') {
        //                 # code...
        //             } else {
        //                 $param = [
        //                     'transaction_details' => [
        //                         'order_id' => Auth::user()->username . '-' . $cekdata[0]->id_item,
        //                         'gross_amount' => 150000,
        //                     ],
        //                     'item_details' => [
        //                         [
        //                             'id' => 'OFFERFEE',
        //                             'price' => 150000,
        //                             'quantity' => 1,
        //                             'name' => 'LelanginStore ' . ucwords($cekdata[0]['offer_type']) . ' Item ' . $cekdata[0]['id_item'],
        //                         ]
        //                     ],
        //                     'customer_details' => [
        //                         'first_name' => Auth::user()->name,
        //                         'email' => Auth::user()->email,
        //                     ]
        //                 ];
        //                 $this->initPaymentGateway();
        //                 try {
        //                     $payment_url = \Midtrans\Snap::getSnapToken($param);
        //                 } catch (Exception $e) {
        //                     echo $e->getMessage();
        //                 }
        //                 Offer::where('id', $cekdata[0]['id'])->update([
        //                     'payment_url' => $payment_url
        //                 ]);
        //             }
        //         } elseif ($content['status_code'] === "200") {
        //             Offer::where('id', $cekdata[0]['id'])->update([
        //                 'order_status' => 'done'
        //             ]);
        //         }
        //         $datapenawaran = DB::table('offers')
        //             ->join('users', 'offers.id_seller', 'users.id')
        //             ->join('items', 'offers.id_item', 'items.item_id')
        //             ->join('brands', 'items.brand', 'brands.id')
        //             ->select([
        //                 'offers.offer_code',
        //                 'offers.offer_price',
        //                 'offers.offer_type',
        //                 'offers.order_status',
        //                 'offers.payment_url',
        //                 'items.name as item_name',
        //                 'items.item_id as id_item',
        //                 'brands.name as brand_name',
        //                 'users.username'
        //             ])
        //             ->where(['offers.offer_code' => $offercode])
        //             ->get();
        //         return view('user.view_status_lelang', [
        //             'data' => $datapenawaran,
        //         ]);
        //     } else {
        //         Alert::alert('Aww Crap!', 'Kamu tidak bisa mengakses transaksi ini!', 'danger');
        //         return redirect(route('page.landing'));
        //     }
        // } else {
        //     # code...
        // }
    }

    public function ikutlelang(Request $data)
    {
        $item = Crypt::decrypt($data->item);
        $penjual = Crypt::decrypt($data->penjual);
        $dataitem = Item::where('id', $item)->get('item_id');
        if (Auth::check()) {
            if ($penjual == Auth::user()->username) {
                Alert::alert('Aww Crap!', 'Kamu merupakan penjual item ini!', 'danger');
                return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
            } else {
                $checkdata = JoinBid::where([
                    [
                        'status', '<>', 'cancel'
                    ],
                    'item_id' => $item,
                    'user_id' => Auth::user()->id,
                ])->get();
                if (count($checkdata) > 0) {
                    Alert::alert('Aww Crap!', 'Kamu sudah mengikuti pelelangan item ini!', 'danger');
                    return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
                } else {
                    $order_id = Auth::user()->username . '-' . $dataitem[0]['item_id'];
                    $param = [
                        'transaction_details' => [
                            'order_id' => $order_id,
                            'gross_amount' => 150000,
                        ],
                        'item_details' => [
                            [
                                'id' => 'OFFERFEE',
                                'price' => 150000,
                                'quantity' => 1,
                                'name' => 'LelanginStore Join Bid. Item ' . $dataitem[0]['item_id'],
                            ]
                        ],
                        'customer_details' => [
                            'first_name' => Auth::user()->name,
                            'email' => Auth::user()->email,
                        ]
                    ];
                    $this->initPaymentGateway();
                    try {
                        $payment_url = \Midtrans\Snap::getSnapToken($param);
                    } catch (Exception $e) {
                        dd($e->getMessage());
                    }
                    $datatodb = [
                        'user_id' =>  Auth::user()->id,
                        'item_id' => $item,
                        'order_id' => Auth::user()->username . '-' . $dataitem[0]['item_id'],
                        'payment_url' => $payment_url,
                        'status' => 'initiate'
                    ];
                    // dd([
                    //     'datakemidtrans' => $param,
                    //     'datakedatabase' => $datatodb,
                    //     'paymenturl' => $payment_url,
                    // ]);
                    JoinBid::insert([
                        $datatodb
                    ]);
                    Alert::alert('Yeay!', 'Berhasil mengikuti lelang! Silahkan menyelesaikan pembayarannya yaa!', 'success');
                    return redirect(route('item.view', [
                        'username' => $penjual,
                        'id_item' => $dataitem[0]['item_id']
                    ]));
                }
            }
        } else {
            Alert::alert('Aww Crap!', 'Kamu harus masuk untuk melakukan transaksi ini!', 'danger');
            return redirect(route('item.view', [
                'username' => $penjual,
                'id_item' => $dataitem[0]['item_id']
            ]));
        }
        // check if user have done the proccess
        // if (Auth::check()) {
        //     if ($data->nama_penjual == Auth::user()->username) {
        //         Alert::alert('Aww Crap!', 'Kamu merupakan penjual item ini!', 'danger');
        //         return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
        //     } else {
        //         $checkdata = Offer::where([
        //             [
        //                 'order_status', '<>', 'cancel'
        //             ],
        //             'id_item' => $data->item_id,
        //             'id_penawar' => $data->user_id,
        //         ])->get();
        //         if (count($checkdata) > 0) {
        //             Alert::alert('Aww Crap!', 'Kamu sudah melakukan penawaran di item ini!', 'danger');
        //             return redirect(route('item.view', ['username' => $data->nama_penjual, 'id_item' => $data->item_id]));
        //         } else {
        //             $tanggal = date('Y-m-d H:i:s');
        //             $previous = null;
        //             $checkdataterakhir = Offer::where([
        //                 'id_item' => $data->item_id,
        //                 'id_seller' => $data->id_penjual,
        //             ])
        //                 ->orderBy('created_at', 'desc')
        //                 ->get();
        //             if (count($checkdataterakhir) != 0) {
        //                 $previous = $checkdataterakhir[0]['offer_code'];
        //             }
        //             $offer_code = [
        //                 'previous_offer_code' => null,
        //                 'id_penawar' => $data->user_id,
        //                 'id_seller' => $data->id_penjual,
        //                 'id_item' => $data->item_id,
        //                 'offer_price' => $data->harga,
        //                 'offer_type' => $data->jenis,
        //                 'created_at' => $tanggal,
        //             ];
        //             $order_id = Auth::user()->username . '-' . $data->item_id . '-' . $this->generateRandomString(3, 3);
        //             $param = [
        //                 'transaction_details' => [
        //                     'order_id' => $order_id,
        //                     'gross_amount' => 150000,
        //                 ],
        //                 'item_details' => [
        //                     [
        //                         'id' => 'OFFERFEE',
        //                         'price' => 150000,
        //                         'quantity' => 1,
        //                         'name' => 'LelanginStore ' . ucwords($data->jenis) . ' Item ' . $data->item_id,
        //                     ]
        //                 ],
        //                 'customer_details' => [
        //                     'first_name' => Auth::user()->name,
        //                     'email' => Auth::user()->email,
        //                 ]
        //             ];
        //             $this->initPaymentGateway();
        //             try {
        //                 $payment_url = \Midtrans\Snap::getSnapToken($param);
        //             } catch (Exception $e) {
        //                 dd($e->getMessage());
        //             }
        //             Offer::insert([
        //                 'offer_code' => hash('md2', serialize($offer_code)),
        //                 'id_penawar' => $data->user_id,
        //                 'id_seller' => $data->id_penjual,
        //                 'id_item' => $data->item_id,
        //                 'offer_price' => $data->harga,
        //                 'payment_url' => $payment_url,
        //                 'order_id' => $order_id,
        //                 'offer_type' => $data->jenis,
        //                 'created_at' => $tanggal,
        //                 'order_status' => 'initiate',
        //                 'updated_at' => $tanggal
        //             ]);
        //             Alert::alert('Yeay!', 'Berhasil melakukan penawaran! Silahkan menyelesaikan pembayaran!', 'success');
        //             return redirect(route('item.view', [
        //                 'username' => $data->nama_penjual,
        //                 'id_item' => $data->item_id
        //             ]));
        //         }
        //     }
        // } else {
        //     Alert::alert('Aww Crap!', 'Kamu harus masuk untuk melakukan transaksi ini!', 'danger');
        //     return redirect(route('item.view', [
        //         'username' => $data->nama_penjual,
        //         'id_item' => $data->item_id
        //     ]));
        // }
    }
    public function canceloffer($id)
    {
        $getdata = Offer::where('offer_code', $id)->get([
            'id_penawar'
        ]);
        if ($getdata[0]->id_penawar === Auth::user()->id) {
            Offer::where('offer_code', $id)->update([
                'order_status' => 'cancel'
            ]);
            Alert::alert('Yaaah!', 'Kamu telah membatalkan penawaran ini!', 'success');
            return redirect(route('view.cart', [
                'offer_code' => wordwrap($id, 4, '-', true)
            ]));
        } else {
            Alert::alert('Aww Crap!', 'Kamu tidak bisa mengakses halaman ini!', 'danger');
            return redirect(route('page.landing'));
        }
    }

    public function pembayaran()
    {
        echo 'pembayaran';
    }
}
