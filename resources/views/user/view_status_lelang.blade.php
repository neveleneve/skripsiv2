@extends('layouts.master')

@section('title')
    <title>
        Transaction {{ $data[0]->offer_code }} - LelanginStore
    </title>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center mt-5 pt-5 mb-3">
            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="text-success" href="{{ route('landing-page') }}">
                                <strong>Lelangin</strong>Store
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="text-success" href="{{ route('profile') }}">
                                {{ Auth::user()->username }}
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="text-success" href="{{ route('cart') }}">
                                Status Lelang
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Transaksi
                        </li>
                    </ol>
                </nav>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-bold h4">
                            Detail Transaksi
                            <hr>
                        </p>
                        <table class="mb-3">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>ID Transaksi &nbsp;</strong>
                                    </td>
                                    <td>
                                        <strong>: &nbsp;</strong>
                                    </td>
                                    <td>
                                        {{ $data[0]->offer_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Harga Penawaran &nbsp;</strong>
                                    </td>
                                    <td>
                                        <strong>: &nbsp;</strong>
                                    </td>
                                    <td>
                                        Rp. {{ number_format($data[0]->offer_price, 0, '.', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row mb-3">
                            <div class="col-4">
                                <a target="__blank"
                                    href="{{ route('item.view', ['username' => $data[0]->username, 'id_item' => $data[0]->id_item]) }}">
                                    <img src="{{ file_exists('img/items/' . $data[0]->id_item . '-1.png')? asset('img/items/' . $data[0]->id_item . '-1.png'): asset('img/items/default.png') }}"
                                        class="d-block w-100" alt="...">
                                </a>
                            </div>
                            <div class="col-8">
                                <a target="__blank" class="text-dark"
                                    href="{{ route('item.view', ['username' => $data[0]->username, 'id_item' => $data[0]->id_item]) }}">
                                    <p class="fw-bold mb-0">{{ $data[0]->item_name }}</p>
                                </a>
                                <p class="">by
                                    <a target="__blank"
                                        href="{{ route('user.view', ['username' => $data[0]->username]) }}"
                                        class="text-dark">
                                        {{ $data[0]->username }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-bold h4">
                            Detail Pembayaran
                            <hr>
                        </p>
                        <table>
                            <tr>
                                <td>
                                    <strong>Jenis Penawaran &nbsp;</strong>

                                </td>
                                <td>
                                    <strong>: &nbsp;</strong>
                                </td>
                                <td>
                                    {{ $data[0]->offer_type == 'bid' ? 'Lelang' : 'Beli Langsung' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Biaya Lelang &nbsp;</strong>

                                </td>
                                <td>
                                    <strong>: &nbsp;</strong>
                                </td>
                                <td>
                                    Rp. 150.000
                                </td>

                            </tr>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-12 d-grid gap-2">
                                @if ($data[0]->order_status == 'initiate')
                                    <button id="bayar" class="btn btn-sm btn-outline-success">Bayar Sekarang</button>
                                    <button id="cancel" class="btn btn-sm btn-outline-danger">Batalkan Penawaran</button>
                                @elseif ($data[0]->order_status == 'payment')
                                    <button class="btn btn-sm btn-outline-success">Menunggu Konfirmasi Pembayaran</button>
                                @elseif($data[0]->order_status == 'done')
                                    <button class="btn btn-sm btn-outline-success">Pembayaran Selesai</button>
                                @elseif($data[0]->order_status == 'cancel')
                                    <button class="btn btn-sm btn-outline-success">Penawaran dibatalkan</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    @if ($data[0]->order_status == 'initiate')
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{ ENV('MIDTRANS_CLIENT_KEY') }}"></script>
        <script type="text/javascript">
            var payButton = document.getElementById('bayar');
            payButton.addEventListener('click', function() {
                window.snap.pay('{{ $data[0]->payment_url }}');
            });
        </script>
    @elseif ($data[0]->order_status == 'done')

    @elseif($data[0]->order_status == 'done')

    @elseif($data[0]->order_status == 'done')
    @endif
@endsection
