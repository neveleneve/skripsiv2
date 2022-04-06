@extends('layouts.master')

@section('title')
    <title>
        {{ $item[0]->name }} by {{ $item[0]->username }} - LelanginStore
    </title>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row mt-5 pt-5 mb-0">
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png')? asset('img/items/' . $item[0]->item_id . '-1.png'): asset('img/items/default.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png')? asset('img/items/' . $item[0]->item_id . '-1.png'): asset('img/items/default.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ file_exists('img/items/' . $item[0]->item_id . '-1.png')? asset('img/items/' . $item[0]->item_id . '-1.png'): asset('img/items/default.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev w-auto" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next w-auto" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item[0]->name }}</h5>
                        <p class="card-text"><strong>Deskripsi : </strong>{{ $item[0]->description }}</p>
                        <p class="card-text m-0"><strong>Tahun : </strong>{{ $item[0]->tahun }}</p>
                        <p class="card-text m-0"><strong>Open Bid :
                            </strong>Rp. {{ number_format($item[0]->open_bid, 0, ',', '.') }}</p>
                        <p class="card-text"><strong>Buy It Now :
                            </strong>Rp. {{ number_format($item[0]->buyitnow, 0, ',', '.') }}</p>
                        <p class="card-text m-0"><small class="text-muted">Diposting pada :
                                {{ date('d M Y, H:i:s', strtotime($item[0]->created_at)) }} WIB</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
