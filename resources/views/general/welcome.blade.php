@extends('layouts.master')

@section('title')
    <title>
        Situs Lelang Mobil - LelanginStore
    </title>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row mt-5 pt-5 mb-3">
            <div class="col-12 ">
                <ul class="nav nav-pills nav-fill border rounded-3 bg-light">
                    <li class="nav-item">
                        <a class="nav-link text-success fw-bold" href="{{ route('category') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success fw-bold" href="{{ route('brand') }}">Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success fw-bold" href="{{ route('most-viewed') }}">Sering Dilihat</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-12">
                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/carousel/carousel1.webp') }}" alt="Los Angeles"
                                class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/carousel/carousel1.webp') }}" alt="Los Angeles"
                                class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/carousel/carousel1.webp') }}" alt="Los Angeles"
                                class="d-block w-100">
                        </div>
                    </div>
                    <a class="carousel-control-prev w-auto bg-dark" type="button" data-bs-target="#demo"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next w-auto bg-dark" type="button" data-bs-target="#demo"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-header bg-light text-success">
                        <h3 class="text-center">Item Terbaru</h3>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="demo2" class="border rounded py-3 carousel carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if (count($items) > 0)
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($items as $data)
                                        <div class="col-2">
                                            <div class="card">
                                                <a
                                                    href="{{ route('item.view', ['username' => $data->username, 'id_item' => $data->item_id]) }}">
                                                    <img class="card-img-top img-fluid"
                                                        src="{{ file_exists('img/items/' . $data->item_id . '-1.png')? asset('img/items/' . $data->item_id . '-1.png'): asset('img/items/default.png') }}"
                                                        alt="">
                                                </a>
                                                <div class="card-body">
                                                    <a class="fs-6 text-dark text-decoration-none fw-bold"
                                                        href="{{ route('item.view', ['username' => $data->username, 'id_item' => $data->item_id]) }}">
                                                        {{ $data->name }}
                                                    </a>
                                                    <br>
                                                    <small>
                                                        <a class="text-dark"
                                                            href="{{ route('user.view', ['username' => $data->username]) }}">
                                                            {{ $data->username }}
                                                        </a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($loop->index == 4)
                                            @php
                                                break;
                                            @endphp
                                        @else
                                            @php
                                                $counter++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (count($items) > 5)
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    @foreach ($items as $data)
                                        @if ($loop->index >= 5 && $loop->index <= 9)
                                            <div class="col-2">
                                                <div class="card">
                                                    <a
                                                        href="{{ route('item.view', ['username' => $data->username, 'id_item' => $data->item_id]) }}">
                                                        <img class="card-img-top img-fluid"
                                                            src="{{ file_exists('img/items/' . $data->item_id . '-1.png')? asset('img/items/' . $data->item_id . '-1.png'): asset('img/items/default.png') }}"
                                                            alt="">
                                                    </a>
                                                    <div class="card-body">
                                                        <a class="fs-6 text-dark text-decoration-none fw-bold"
                                                            href="{{ route('item.view', ['username' => $data->username, 'id_item' => $data->item_id]) }}">
                                                            {{ $data->name }}
                                                        </a>
                                                        <br>
                                                        <small>
                                                            <a class="text-dark"
                                                                href="{{ route('user.view', ['username' => $data->username]) }}">
                                                                {{ $data->username }}
                                                            </a>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($loop->index == 9)
                                            @php
                                                break;
                                            @endphp
                                        @else
                                            @php
                                                $counter++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (count($items) > 10)
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    @foreach ($items as $data)
                                        @if ($loop->index >= 10 && $loop->index <= 14)
                                            <div class="col-2">
                                                <div class="card">
                                                    <a
                                                        href="{{ route('item.view', ['username' => $data->username, 'id_item' => $data->item_id]) }}">
                                                        <img class="card-img-top img-fluid"
                                                            src="{{ file_exists('img/items/' . $data->item_id . '-1.png')? asset('img/items/' . $data->item_id . '-1.png'): asset('img/items/default.png') }}"
                                                            alt="">
                                                    </a>
                                                    <div class="card-body">
                                                        <a class="fs-6 text-dark text-decoration-none fw-bold"
                                                            href="{{ route('item.view', ['username' => $data->username, 'id_item' => $data->item_id]) }}">
                                                            {{ $data->name }}
                                                        </a>
                                                        <br>
                                                        <small>
                                                            <a class="text-dark"
                                                                href="{{ route('user.view', ['username' => $data->username]) }}">
                                                                {{ $data->username }}
                                                            </a>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($loop->index == 14)
                                            @php
                                                break;
                                            @endphp
                                        @else
                                            @php
                                                $counter++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (count($items) > 5)
                        <a class="carousel-control-prev w-auto" type="button" data-bs-target="#demo2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next w-auto" type="button" data-bs-target="#demo2" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
