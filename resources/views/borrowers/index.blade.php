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
                                <h3 class="card-title">List Borrower</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="borrower_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Number of Borrows</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrowers as $borrower)
                                        <tr>
                                            <td>{{ $borrower->name }}</td>
                                            <td>{{ $borrower->number_of_borrows }}</td>
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
                            {{-- {{ $borrowers->links() }} --}}
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    @endif
@endsection