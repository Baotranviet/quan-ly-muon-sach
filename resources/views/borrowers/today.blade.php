@extends('layouts.master')

@section('title-head', 'List Borrower')

@section('content')

    @include('partials.content_header', ['title' => 'Borrower', 'bread_crumb_1' => 'Borrower', 'bread_crumb_2' => 'List'])
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of people who borrowed books today</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (isset($borrowers) && count($borrowers) > 0)
                            <table id="borrower_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Card Number</th>
                                    <th>Name</th>
                                    <th>Day of Birth</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrowers as $borrower)
                                        <tr>
                                            <td>{{ $borrower->card_number }}</td>
                                            <td>{{ $borrower->name }}</td>
                                            <td>{{ $borrower->day_of_birth }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else 
                                <h3 class="card-title" style="margin: auto; width: 100%; text-align: center;"><i>No one borrowed book today</i></h3>
                            @endif
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
@endsection