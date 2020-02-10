@extends('admin.layouts.master')
@section('title','List Categories')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/list-category.css') }}">
@endsection
@section('content')
    <div>
        <div class="content-text">
            <p class="text">List Category</p>
        </div>
        <div class="container main-content">
            <div class="search-content">
                <form action="{{ route('categories.index') }}" method="get">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-form-label">ID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id" value="{{ old('id') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="cat_name" value="{{ old('cat_name') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="double-button">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                    </div>
                </form>
            </div>
            <div class="sub-content-show">
                <a href="" class="btn btn-success add_new" data-toggle="modal" data-target="#addcategory"
                   id="addCategory">Add new</a>
                @include('admin.categories.layouts.message')
                <div class="sub-content-show-table">
                    @if($sumCategory == 0)
                        <table class="table table-striped table-bordered table-hover text-center mt-5 table-template"
                               id="table-categories">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="noData">
                                <td colspan="4" class="alert-danger text-center">No Data</td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        @include('admin.categories.layouts.pagination')
                        @include('admin.categories.layouts.table')
                        @include('admin.categories.layouts.pagination')
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade mt-5" id="addcategory" role="dialog">
            <div class="modal-dialog modal-lg mt-5">
                <div class="modal-content">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                        </div>
                        <div class="row" style="margin: 5px">
                            <div class="col-xl-8 mb-2 offset-2">
                                <form role="form" id="table" method="post">
                                    <fieldset class="form-group mt-2">
                                        <label class="d-sm-inline-block float-left">Category Name</label>
                                        <input class="form-control name-category" id="cat_name" name="cat_name"
                                               placeholder="Enter Category Name">
                                        <span class="error mt-2 d-lg-block w-100"
                                              style="font-size: 16px; color: red !important;"></span>
                                    </fieldset>
                                    <div class="form-group m-auto w-50">
                                        <input type="button" id="add-cate" class="btn btn-success" value="Thêm"></input>
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('assets/js/category/category.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>
@endsection
