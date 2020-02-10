<div class="panel-body">
    <table class="table table-striped table-bordered table-hover text-center" id="table-categories">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        {{ csrf_field() }}
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="item{{$category->id}}">
                <td>{{$category->id}}</td>
                <td>{{$category->cat_name}}</td>
                <td>
                    <button class="btn btn-info edit-category"
                       data-id="{{$category->id}}" data-toggle="modal" data-target="#editCategory">Edit</button>
                    <button class="btn btn-danger" id="del-category" data-id="{{$category->id}}"
                            data-record="{{ $categories->total() }}">Delete
                    </button>
                </td>
            </tr>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.panel-body -->

@section('js')
    <script type="text/javascript" src="{{asset('assets/js/categories/category.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/delete-category.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/js/categories/edit-category.js')}}"></script>
@endsection
@include('admin.categories.layouts.modal')

