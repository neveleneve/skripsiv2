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
                            <a class="text-success" href="{{ route('page.landing') }}">
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
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png') ? asset('img/items/' . $item[0]->item_id . '-1.png') : asset('img/items/default.png') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png') ? asset('img/items/' . $item[0]->item_id . '-1.png') : asset('img/items/default.png') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png') ? asset('img/items/' . $item[0]->item_id . '-1.png') : asset('img/items/default.png') }}"
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
                        <p class="card-text text-justify" style="text-align: justify;">{{ $item[0]->description }}</p>
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
                                        <p class="card-text m-0">
                                            <a class="text-dark text-decoration-none"
                                                title="Lihat Tipe {{ $item[0]->brand_name }}"
                                                href="{{ route('view.brand', ['name' => strtolower($item[0]->brand_name)]) }}">
                                                {{ $item[0]->brand_name }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Tipe</strong></p>
                                        <p class="card-text m-0">
                                            <a class="text-dark text-decoration-none"
                                                title="Lihat Tipe {{ $item[0]->category_name }}"
                                                href="{{ route('view.category', ['name' => strtolower($item[0]->category_name)]) }}">
                                                {{ $item[0]->category_name }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0 mb-lg-3">
                            <div class="col-12 col-lg-4 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Harga Awal Lelang</strong></p>
                                        <p class="card-text m-0">
                                            Rp. {{ number_format($item[0]->open_bid, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Harga Beli Langsung</strong></p>
                                        <p class="card-text m-0">
                                            Rp. {{ number_format($item[0]->buyitnow, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 mb-lg-0 mb-3">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <p class="card-text m-0 text-success"><strong>Penawaran Tertinggi</strong></p>
                                        <p class="card-text m-0">
                                            @if (count($penawaran) > 0)
                                                Rp. {{ number_format($penawaran[0]->offer_price, 0, ',', '.') }}
                                            @else
                                                Belum Ada
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-0 col-lg-8"></div>
                            <div class="col-12 col-lg-4 d-grid gap-2">
                                @auth
                                    {{-- cek jika user yang sudah login --}}
                                    @if (Auth::user()->role == 'user')
                                        {{-- cek jika user yang sudah login dengan level 'user' --}}
                                        @if (Auth::user()->username == $item[0]->username)
                                            {{-- untuk user yang melelangkan barang --}}
                                            <a href="{{ route('item.penawaran', ['username' => $item[0]->username, 'id_item' => $item[0]->item_id]) }}"
                                                class="btn btn-sm btn-outline-success fw-bold">
                                                Lihat Penawaran Lelang
                                            </a>
                                        @else
                                            {{-- untuk selain user yang melelangkan barang --}}
                                            @if (count($statusjoin) > 0)
                                                {{-- cek status join lelang user --}}
                                                {{-- @if ($penawaran[0][])
                                                    
                                                @else
                                                    
                                                @endif --}}
                                                <a href="{{ route('view.cart', ['offer_code' => wordwrap($cekpenawaran[0]['offer_code'], 4, '-', true)]) }}"
                                                    class="btn btn-sm btn-outline-success fw-bold">
                                                    Lihat Transaksi
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-outline-success fw-bold">
                                                    Belum Join Lelang {{ count($statusjoin) . Auth::user()->username }}
                                                </button>
                                                {{-- modal mengikuti lelang --}}
                                                {{-- <div class="modal fade" id="modalikutlelang" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Penawaran Lelang
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('penawaran') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::user()->id }}">
                                                                <input type="hidden" name="nama_lengkap"
                                                                    value="{{ Auth::user()->name }}">
                                                                <input type="hidden" name="item_id"
                                                                    value="{{ $item[0]->item_id }}">
                                                                <input type="hidden" name="nama_penjual"
                                                                    value="{{ $item[0]->username }}">
                                                                <input type="hidden" name="id_penjual"
                                                                    value="{{ $item[0]->id }}">
                                                                <div class="modal-body">
                                                                    <label class="fw-bold" for="jenis">
                                                                        Jenis Penawaran
                                                                    </label>
                                                                    <select name="jenis" id="jenis"
                                                                        class="form-control form-control-sm mb-3">
                                                                        <option value="bid">Lelang</option>
                                                                        <option value="buy">Beli Langsung</option>
                                                                    </select>
                                                                    <label class="fw-bold" for="harga">
                                                                        Harga Penawaran
                                                                    </label>
                                                                    <input type="number" class="form-control form-control-sm"
                                                                        name="harga" id="harga" step="1000000"
                                                                        min="{{ count($penawaran) == 0 ? $item[0]->open_bid : $penawaran[0]->offer_price }}"
                                                                        value="{{ count($penawaran) == 0 ? $item[0]->open_bid : $penawaran[0]->offer_price + 1000000 }}">
                                                                    <small>
                                                                        - Penawaran yang dimasukkan merupakan Kelipatan Rp.
                                                                        1.000.000
                                                                    </small>
                                                                    <br>
                                                                    <small>
                                                                        - Minimal penawaran lelang :
                                                                        {{ count($penawaran) == 0 ? 'Rp. ' . number_format($item[0]->open_bid, 0, ',', '.') : 'Rp. ' . number_format($penawaran[0]->offer_price + 1000000, 0, ',', '.') }}
                                                                    </small>
                                                                    @if (count($penawaran) != 0)
                                                                        <br>
                                                                        <small>
                                                                            - Harga penawaran tertinggi :
                                                                            Rp.
                                                                            {{ number_format($penawaran[0]->offer_price, 0, ',', '.') }}
                                                                        </small>
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-success"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-success">
                                                                        Lanjutkan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            @endif
                                        @endif
                                    @else
                                        {{-- cek jika user yang sudah login dengan level selain 'user' --}}
                                        <a href="{{ route('item.penawaran', ['username' => $item[0]->username, 'id_item' => $item[0]->item_id]) }}"
                                            class="btn btn-sm btn-outline-success fw-bold">
                                            Lihat Penawaran Lelang
                                        </a>
                                    @endif
                                @else
                                    {{-- cek jika user yang belum login --}}
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success fw-bold">
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
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-bordered text-nowrap text-center">
                            <thead class="bg-success text-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penawaran</th>
                                    <th>Tipe Penawaran</th>
                                    <th>Harga Penawaran</th>
                                    <th>Waktu Penawaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($penawaran as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            @auth
                                                @if ($item->id_penawar == Auth::user()->id)
                                                    <a class="text-dark"
                                                        href="{{ route('view.cart', ['offer_code' => wordwrap($item->offer_code, 4, '-', true)]) }}"
                                                        title="Penawaran Kamu">
                                                        {{ strtoupper($item->offer_code) }}
                                                    </a>
                                                @else
                                                    {{ strtoupper($item->offer_code) }}
                                                @endif
                                            @else
                                                {{ strtoupper($item->offer_code) }}
                                            @endauth
                                        </td>
                                        <td>
                                            @if ($item->offer_type == 'bid')
                                                Penawaran Lelang
                                            @elseif ($item->offer_type == 'buy')
                                                Beli Langsung
                                            @endif
                                        </td>
                                        <td>
                                            Rp. {{ number_format($item->offer_price, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ time_elapsed_string($item->updated_at) }} <i class="bi-exclamation-circle"
                                                title="{{ date('d M Y H:i', strtotime($item->updated_at)) }}"></i>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <h3 class="text-center text-success">Belum ada penawaran</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
