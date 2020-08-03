@extends('layouts.master')

@section('title-head', 'List Borrow')

@section('content')

    @include('partials.content_header', ['title' => 'Borrow', 'bread_crumb_1' => 'Borrow', 'bread_crumb_2' => 'List'])
      <section class="content">
          <div class="container-fluid">
            <form id="formGetDay" action="{{ route('borrow.get_day') }}" method="POST" class="form-horizontal">
                  @csrf
                    <!-- Book Name -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label for="from_day" class="control-label">From Day</label>
                                <input type="date" name="from_day" id="from_day" class="form-control @error('from_day') is-invalid @enderror">
                                
                                @error('from_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <label for="to_day" class="control-label">To Day</label>
                                    <input type="date" name="to_day" id="to_day" class="form-control @error('to_day') is-invalid @enderror">
                                    
                                    @error('to_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Add Book Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-md-12 col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Find
                                </button>
                            </div>
                        </div>
                    </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of people who borrow books from day to day</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="borrower_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Borrow Date</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table_get_day">
                                        
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
@endsection