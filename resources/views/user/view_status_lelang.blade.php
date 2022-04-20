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
                        <p><strong>ID Transaksi : </strong> {{ $data[0]->offer_code }}</p>
                        <div class="row mb-3">
                            <div class="col-4">
                                <img src="{{ file_exists('img/items/' . $data[0]->id_item . '-1.png')? asset('img/items/' . $data[0]->id_item . '-1.png'): asset('img/items/default.png') }}"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="col-8">
                                <p class="fw-bold mb-0">{{ $data[0]->item_name }}</p>
                                <p class="">by {{ $data[0]->username }}</p>
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
                        <p><strong>Jenis Penawaran : </strong>
                            {{ $data[0]->offer_type == 'bid' ? 'Lelang' : 'Beli Langsung' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
