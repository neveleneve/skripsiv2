@extends('layouts.master')

@section('title')
    <title>
        {{ $item[0]->name }} by {{ $item[0]->username }} - LelanginStore
    </title>
@endsection

@section('content')
    @include('function.func')
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
                        <li class="breadcrumb-item active" aria-current="page">{{ $item[0]->name }} by <a
                                class="text-dark"
                                href="{{ route('user.view', ['username' => $item[0]->username]) }}">{{ $item[0]->username }}</a>
                        </li>
                    </ol>
                </nav>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png')? asset('img/items/' . $item[0]->item_id . '-1.png'): asset('img/items/default.png') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png')? asset('img/items/' . $item[0]->item_id . '-1.png'): asset('img/items/default.png') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png')? asset('img/items/' . $item[0]->item_id . '-1.png'): asset('img/items/default.png') }}"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev w-auto" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next w-auto" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-success">{{ $item[0]->name }}
                        </h4>
                        <p class="card-text m-0">
                            <small class="text-muted">Diposting oleh
                                <a class="text-dark"
                                    href="{{ route('user.view', ['username' => $item[0]->username]) }}">{{ $item[0]->username }}</a>
                                pada :
                                {{ date('d M Y, H:i:s', strtotime($item[0]->created_at)) }} WIB
                            </small>
                        </p>
                        <small>
                            @if (date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($item[0]->end_time)))
                                <span class="badge bg-danger" title="Waktu pelelangang sudah berakhir">Pelelangan
                                    Selesai</span>
                            @else
                                <span class="badge bg-success" title="Waktu pelelangang masih berlangsung">Pelelangan
                                    Aktif</span>
                            @endif
                        </small>
                        <hr>
                        <p class="card-text mb-2 text-success"><strong>Deskripsi</strong></p>
                        <p class="card-text">{{ $item[0]->description }}</p>
                        <p class="card-text mb-2 text-success"><strong>Tanggal Berakhir</strong></p>
                        <p class="card-text">{{ date('d M Y, H:i:s', strtotime($item[0]->end_time)) }} WIB</p>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-4 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Tahun</strong></p>
                                        <p class="card-text m-0">{{ $item[0]->tahun }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Brand</strong></p>
                                        <p class="card-text m-0">{{ $item[0]->brand_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Tipe</strong></p>
                                        <p class="card-text m-0">{{ $item[0]->category_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0 mb-lg-3">
                            <div class="col-12 col-lg-6 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Harga Awal Lelang</strong></p>
                                        <p class="card-text m-0">Rp.
                                            {{ number_format($item[0]->open_bid, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Harga Beli Langsung</strong></p>
                                        <p class="card-text m-0">Rp.
                                            {{ number_format($item[0]->buyitnow, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-0 col-lg-8"></div>
                            <div class="col-12 col-lg-4 d-grid gap-2">
                                @auth
                                    @if (Auth::user()->role == 'user')
                                        @if (Auth::user()->username == $item[0]->username)
                                            <a href="{{ route('item.penawaran', ['username' => $item[0]->username, 'id_item' => $item[0]->item_id]) }}"
                                                class="btn btn-outline-success fw-bold">
                                                Lihat Penawaran Lelang
                                            </a>
                                        @else
                                            @if (count($cekpenawaran) > 0)
                                                <a href="{{ route('view.cart', ['offer_code' => $cekpenawaran[0]['offer_code']]) }}"
                                                    class="btn btn-outline-success fw-bold">
                                                    Lihat Transaksi
                                                </a>
                                            @else
                                                <button class="btn btn-outline-success fw-bold">
                                                    Ikuti Lelang
                                                </button>
                                            @endif
                                        @endif
                                    @else
                                        <a href="{{ route('item.penawaran', ['username' => $item[0]->username, 'id_item' => $item[0]->item_id]) }}"
                                            class="btn btn-outline-success fw-bold">
                                            Lihat Penawaran Lelang
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-success fw-bold">
                                        Masuk Untuk Ikuti Lelang
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-light text-success">
                        <h4 class="fw-bold">Penawaran</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-success text-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penawaran</th>
                                    <th>Tipe Penawaran</th>
                                    <th>Harga Penawaran</th>
                                    <th>Tanggal Penawaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($penawaran as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->offer_code }}</td>
                                        <td>
                                            @if ($item->offer_type == 'lelang')
                                                Penawaran Lelang
                                            @elseif ($item->offer_type == 'lelang')
                                                Beli Langsung
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($item->offer_price, 0, ',', '.') }}</td>
                                        <td>{{ time_elapsed_string($item->created_at) }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
