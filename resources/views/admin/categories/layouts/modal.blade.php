<div class="modal fade" id="modal-del-category">
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
                <button class="btn btn-primary" id="btn-del-category" type="submit"><span
                            class="glyphicon glyphicon-trash"></span>Ok
                </button>
                </form>
            </div>
        </div>
    </div>
</div><!-- modal delete category -->
<!--modal edit-->
<div class="modal fade mt-5" id="editCategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT CATEGORY<p
                        class="title d-inline-flex ml-1"></p></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-1">
                    <div class="col-lg-12 mb-2">
                        <form role="form" id="formCategory">
                            <input type="hidden" name="id" class="id-category">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input class="form-control mt-2" id="category_name" name="name"
                                       placeholder="Enter Category Name">
                                <span class="error mt-2 d-lg-block w-100 font-italic text-danger"></span>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateCategory">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
