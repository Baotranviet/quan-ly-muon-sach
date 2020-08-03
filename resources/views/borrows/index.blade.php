@extends('layouts.master')

@section('title-head', 'List Borrow')

@section('content')

    @include('partials.content_header', ['title' => 'Borrow', 'bread_crumb_1' => 'Borrow', 'bread_crumb_2' => 'List'])
    @if (isset($borrows) && count($borrows) > 0)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of people who borrowed books</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="borrow_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Borrower</th>
                                        <th>Book Name</th>
                                        <th>Borrow Date</th>
                                        <th>PayDate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrows as $borrow)
                                        <tr>
                                            <td>{{ $borrow->borrower->name }}</td>
                                            <td>{{ $borrow->book->book_name }}</td>
                                            <td>{{ $borrow->borrow_date }}</td>
                                            <td>{{ $borrow->pay_date }}</td>
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
                            {{ $borrows->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    @endif
@endsection