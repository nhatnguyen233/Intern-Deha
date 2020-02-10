<div class="modal fade" id="modal-add-product">
    <div class="modal-dialog width-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Category <span
                                class="required">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="cat_id" name="cat_id">
                                @foreach($categoryEdit as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>}
                                    option
                                @endforeach
                            </select>
                            <span class="span-error text-danger" id="span-cat_id"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Name <span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                   placeholder="Name">
                            <span class="span-error text-danger" id="span-product_name"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Price <span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" id="price-add" placeholder="Price">
                            <span class="span-error text-danger" id="span-price"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Detail <span
                                class="required">*</span></label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="detail" name="detail"
                                      placeholder="Detail"></textarea>
                            <span class="span-error text-danger" id="span-detail"></span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit a product-->
<div class="modal" id="modal-edit-category" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Category <span
                                class="text-danger">*</span>:</label>
                        <div class="col-md-8">
                            <select class="form-control" id="cat-name-edit" name="cat-name-edit">
                                @foreach($categoryEdit as $cat)
                                    <option
                                        value="{{$cat->id}}">{{$cat->id}} - {{$cat->cat_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Name <span
                                class="text-danger">*</span>:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="product-name-edit" name="product-name-edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="price">Price <span
                                class="text-danger">*</span>:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="price-edit" name="price-edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="detail">Detail <span
                                class="text-danger">*</span>:</label>
                        <div class="col-md-8">
                            <textarea name="detail-edit" class="form-control" rows="5" id="detail-edit"></textarea>
                        </div>
                    </div>
                </form>
                <div class="error" id="validation-errors-edit"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update-product">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Modal delete Product -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-del-category">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary delete" id="btn-del-category" type="submit"><span
                        class="glyphicon glyphicon-trash"></span>Ok
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
