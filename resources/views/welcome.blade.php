@extends('layouts.master')

@section('title')
<title>
    Landing Page
</title>
@endsection

@section('content')
<div class="container">
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
                        <img src="{{ asset('img/carousel/carousel1.webp') }}" alt="Los Angeles" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/carousel/carousel1.webp') }}" alt="Los Angeles" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/carousel/carousel1.webp') }}" alt="Los Angeles" class="d-block w-100">
                    </div>
                </div>
                <a class="carousel-control-prev w-auto bg-dark" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next w-auto bg-dark" type="button" data-bs-target="#demo" data-bs-slide="next">
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
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card">
                                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/la.jpg" alt="">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev w-auto" type="button" data-bs-target="#demo2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next w-auto" type="button" data-bs-target="#demo2" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>    
</div>
@endsection