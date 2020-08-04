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
                    <form role="form" id="quickForm" method="POST" action="{{ route('book.store') }}">
                        @csrf
                        <table class="table" id="tableNewBook">
                            <thead>
                            <tr>
                                <th>Book Code</th>
                                <th>Book Name</th>
                                <th>Page Number</th>
                                <th>Quantity</th>
                                <th>Author</th>
                                <th class="text-center"><a id="addNewRow" title="Add new row" class="btn btn-primary btn-sm">+</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" name="rows[0][book_code]" class="form-control" placeholder="Enter Book Code"></td>
                                <td><input type="text" name="rows[0][book_name]" class="form-control" placeholder="Enter Book Name"></td>
                                <td><input type="number" name="rows[0][page_number]" class="form-control" placeholder="Enter Page Number"></td>
                                <td><input type="number" name="rows[0][quantity]" class="form-control" placeholder="Enter Quantity"></td>
                                <td>
                                    <select class="custom-select" name="rows[0][author_id]">
                                        <option></option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">
                                                {{ $author->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center"><a id="removeRow" title="Remove" class="btn btn-danger btn-sm">x</a></td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
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