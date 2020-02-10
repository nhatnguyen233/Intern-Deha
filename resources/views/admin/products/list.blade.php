@extends('admin.layouts.master')
@section('title','List Product')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/create-product.css') }}">
@endsection
@section('content')
    <div>
        <div class="content-text">
            <p class="text">List Product</p>
        </div>
        <div class="container main-content">
            <div class="sub-content-search">
                <div class="search-text">
                    <p><b>Search</b></p>
                </div>
                <div class="search-content">
                    <form action="{{ route('products.index') }}" method="GET">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <div class="form-group row">
                                    <label for="id" class="col-sm-3 col-form-label"><span>ID</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label"><span>Name</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <div class="form-group row">
                                    <label for="category" class="col-sm-2 col-form-label"><span>Category</span></label>
                                    <div class="col-sm-8">
                                        <select id="inputState" class="form-control" name="category">
                                            @foreach($category as $item)
                                            @if(old('category')==$item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->cat_name }}</option>
                                            @endif
                                            <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label"><span>Price</span></label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control price" id="price1" name="price1" value="{{ old('price1') }}">
                                    </div>
                                    <div>~</div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control price" id="price2" name="price2" value="{{ old('price2') }}">
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
            </div>
            <div class="sub-content-show">
                <a class="btn btn-success add_new" href="javascript:;" type="submit">Add new</a>
                @include('admin.products.layouts.message')
                <div id="sub-content">
                    @if($sumProduct>0)
                        @include('admin.products.layouts.pagination')
                        @include('admin.products.layouts.table')
                        @include('admin.products.layouts.pagination')
                    @else
                        <div class="show-text mt-4 mb-4 alert-danger "><h3 class="text-center w-100 h-100 p-2">No
                                data</h3></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('admin.products.layouts.modal')
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('assets/js/cleave.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/product/product.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/create-product.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/edit-product.js') }}"></script>
    <script type="text/javascript">
        function cleave($a){
            var cleave = new Cleave($a, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
        };
        cleave('#price1');
        cleave('#price2');
    </script>
@endsection
