@extends('layouts.master')

@section('title-head', 'Create Borrower')

@section('content')

    @include('partials.content_header', ['title' => 'Borrower', 'bread_crumb_1' => 'Borrower', 'bread_crumb_2' => 'Create'])
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->            
                    @if (session('create-borrower-success'))
                        <div class="alert alert-success mb-0 mt-2" role="alert">
                            {{ session('create-borrower-success') }}
                        </div>
                        <br>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul class="">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('borrower.store') }}">
                        @csrf
                        <div class="form-group">
                          <label>Card Number</label>
                          <input type="text" class="form-control" name="card_number" placeholder="Enter Card Number">
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label>Day of Birth</label>
                          <input type="date" class="form-control" name="day_of_birth"  placeholder="Enter Day of Birth">
                        </div>
                        <div class="form-group">
                          <label>Class</label>
                          <input type="text" class="form-control" name="class"  placeholder="Enter Class">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Add Borrower</button>
                        </div>
                    </form>
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection