@extends('layouts.master')

@section('title-head', 'List Author')

@section('content')

    @include('partials.content_header', ['title' => 'Author', 'bread_crumb_1' => 'Author', 'bread_crumb_2' => 'List'])
        
    @if (isset($authors) && count($authors) > 0)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Author</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="author_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            <button id="btn_delete_author" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </th>
                                        <th>Author Name</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authors as $author)
                                            <tr id="{{ $author->id }}">
                                                <td style="display: none;">{{ $author->id }}</td>
                                                <td><input type="checkbox" name="del-one-author[]" value="{{ $author->id }}"></td>
                                                <td id="name">{{ $author->name }}</td>
                                                <td>
                                                    <a id="edit-author" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit text-white"></i>
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
                            {{ $authors->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="editAuthorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editAuthorForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Author Name</label>
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Author</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    @endif
@endsection