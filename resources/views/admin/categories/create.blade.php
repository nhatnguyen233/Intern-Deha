@extends('admin.layouts.master')
@section('title')
    Create
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/create-product.css') }}">
@endsection
@section('content')
    <div class="content-text">
        <p>Dashboard</p>
        <div class="content-div">
            <div class="content-form">
                <div class="content-error">
                </div>
                <form id="form-add" action="{{ route('categories.store') }}" method="post">
                    @csrf
                    @include('admin.categories.layouts.message')
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Name <span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cat_name" name="cat_name"
                                   placeholder="Name">
                            <span class="span-error text-danger" id="span-cat_name"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-info button-submit" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

