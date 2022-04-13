@extends('layouts.master')
@section('title')
    <title>
        Status Lelang
    </title>
@endsection

@section('content')
    @include('function.func')
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="text-success" href="{{ route('landing-page') }}">
                                <strong>Lelangin</strong>Store
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Status Lelang</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="text-success"><u>Status Lelang</u></h4>
                <hr>
            </div>
            <div class="col-12">
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
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <a class="text-dark" href="{{ route('view.cart', ['offer_code' => $item->offer_code]) }}">
                                        {{ $item->offer_code }}
                                    </a>
                                </td>
                                <td>
                                    @if ($item->offer_type == 'bid')
                                        Penawaran Lelang
                                    @elseif ($item->offer_type == 'buy')
                                        Beli Langsung
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($item->offer_price, 0, ',', '.') }}</td>
                                <td>{{ time_elapsed_string($item->created_at) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h2 class="text-success">
                                        Data Kosong
                                    </h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
