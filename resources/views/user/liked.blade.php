@extends('layouts.master')
@section('title')
    <title>
        Items You Liked
    </title>
@endsection

@section('content')
    <div class="container">
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
                        <li class="breadcrumb-item active" aria-current="page">Item Favorit</li>
                    </ol>
                </nav>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5><u>Item Favorit</u></h5>
            </div>
            <div class="col-12">
                <h1 class="text-center">Daftar kosong</h1>
            </div>
        </div>


    </div>
@endsection
