@extends('layouts.master')

@section('title')
<title>
    Dashboard
</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 pt-5 mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-success fw-bold">{{ __('Dashboard') }}</div>
                <div class="card-body text-center">                    
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection