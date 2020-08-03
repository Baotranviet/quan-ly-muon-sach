@extends('layouts.master')

@section('title-head', 'List Borrower')

@section('content')

    @include('partials.content_header', ['title' => 'Borrower', 'bread_crumb_1' => 'Borrower', 'bread_crumb_2' => 'List'])
    @if (isset($borrowers) && count($borrowers) > 0)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of people who borrow books but have not yet paid</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="borrower_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Card Number</th>
                                        <th>Name</th>
                                        <th>Borrow Date</th>
                                        <th>Pay Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrowers as $borrower)
                                        <tr>
                                            <td>{{ $borrower->card_number }}</td>
                                            <td>{{ $borrower->name }}</td>
                                            <td>{{ $borrower->borrow_date }}</td>
                                            <td>{{ $borrower->pay_date }}</td>
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
            </div>
        </section>
    @endif
@endsection