@extends('layouts.master')

@section('title-head', 'List Book')

@section('content')

    @include('partials.content_header', ['title' => 'Book', 'bread_crumb_1' => 'Book', 'bread_crumb_2' => 'List'])

    @if (isset($books) && count($books) > 0)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Book</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="book_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            <button id="btn_delete" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </th>
                                        <th>Book Code</th>
                                        <th>Book Name</th>
                                        <th>Page Number</th>
                                        <th>Quantity</th>
                                        <th>Author</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                        <tr id="{{ $book->id }}">
                                            <td><input type="checkbox" name="del-one[]" value="{{ $book->id }}"></td>
                                            <td>{{ $book->book_code }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->page_number }}</td>
                                            <td>{{ $book->quantity }}</td>
                                            <td>{{ $book->author->name }}</td>
                                            <td>
                                                <a href="{{ route('book.edit',['book' => $book->id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    @endif
@endsection