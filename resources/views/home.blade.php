@extends('layouts.master')

@section('title-head', 'Home')

@section('content')

@include('partials.content_header', ['title' => 'Dashboard', 'bread_crumb_1' => 'Home', 'bread_crumb_2' => 'Dasboard'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <h1 class="text-center">Home</h1>
            </div>
        </div>
    </div>
    
@endsection
