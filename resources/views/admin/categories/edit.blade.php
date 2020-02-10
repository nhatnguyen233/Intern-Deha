@extends('admin.layouts.master')
@section('tilte','Edit Category')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/edit-category.css') }}">
@endsection
@section('content')
    <div>
        <div class="content-text">
            <p class="text">Edit Category</p>
        </div>
        <div class="container main-content edit-form">
            <form action="{{ route('categories.update',$category->id) }}" method="POST"
                  class="form-inlin justify-content-center">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-5 name-input">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-abel">Name&nbsp;<span
                                    style="color: red">*</span></span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="cat_name"
                                       value="{{ $category->cat_name }}">
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{ $error }}</div><br/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-edit-cat">Save</button>
            </form>
        </div>
    </div>
@endsection
