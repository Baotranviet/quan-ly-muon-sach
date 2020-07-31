@extends('layouts.master')

@section('title-head', 'Create Book')

@section('content')

    @include('partials.content_header', ['title' => 'Book', 'bread_crumb_1' => 'Book', 'bread_crumb_2' => 'Create'])
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->            
                    @if (session('create-book-success'))
                        <div class="alert alert-success mb-0 mt-2" role="alert">
                            {{ session('create-book-success') }}
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create a new book</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="POST" action="{{ route('book.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Book Code</label>
                                    <input type="text" name="book_code" class="form-control" placeholder="Enter Book Code">
                                </div>
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" name="book_name" class="form-control" placeholder="Enter Book Name">
                                </div>
                                <div class="form-group">
                                    <label>Page Number</label>
                                    <input type="number" name="page_number" class="form-control" placeholder="Enter Page Number">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                                </div>
                                <div class="form-group">
                                    <label>Author</label>
                                    <input type="text" name="author" class="form-control" placeholder="Enter Author">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection