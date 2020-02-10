<div class="panel-body">
    <table class="table table-striped table-bordered table-hover" id="table-product">
        <thead>
        <tr>
            <th style="width: 5%" valign="middle">ID</th>
            <th style="width: 40%">Name</th>
            <th style="width: 10%">Price</th>
            <th style="width: 10%">Category</th>
            <th style="text-align: center">Actions</th>
        </tr>
        {{ csrf_field() }}
        </thead>
        <tbody id="body-table-product">
        @foreach($products as $product)
            <tr class="item{{$product->id}}">
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{number_format($product->price)}}</td>
                <td>{{$product->category->cat_name}}</td>
                <td>
                    <button class="btn btn-info edit-product" id="edit-product" data-id="{{$product->id}}">Edit</a>
                    </button>
                    <button type="button" class="btn btn-danger del-product" data-id="{{ $product->id }}"
                            id="delproduct" data-toggle="modal" data-target="#deleteModal"
                            data-record="{{$products->total()}}">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><!-- /.panel-body -->







