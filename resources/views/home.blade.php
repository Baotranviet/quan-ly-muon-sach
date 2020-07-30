@extends('layouts.master')

@section('title-head', 'Home')

@section('content')

@include('partials.content_header', ['title' => 'Dashboard', 'bread_crumb_1' => 'Home', 'bread_crumb_2' => 'Dasboard'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
