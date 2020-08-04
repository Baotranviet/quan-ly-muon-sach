@extends('layouts.master')

@section('title-head', 'Create Author')

@section('content')

    @include('partials.content_header', ['title' => 'Author', 'bread_crumb_1' => 'Author', 'bread_crumb_2' => 'Create'])
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-md-2">
                    <!-- jquery validation -->            
                    @if (session('create-author-success'))
                        <div class="alert alert-success mb-0 mt-2" role="alert">
                            {{ session('create-author-success') }}
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
                    <form method="POST" action="{{ route('author.store') }}">
                        @csrf
                        <div class="form-group">
                          <label>Author Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter Author Name">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Add Author</button>
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