$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /**
     * Delete product by ajax
     *
     * @type {number}
     */
    let delProduct = (function () {
        let id;
        let record;
        // let click = 0;
        let click = $('.delete').click();

        function delProduct() {
            $(document).on('click', '#delproduct', function () {
                id = $(this).data('id');
                if (click) {
                    record = $(this).data('record');
                    click++;
                } else record = record;
            })
        }

        function deleteProduct() {
            $(document).on('click', '.delete', function () {
                $.ajax({
                    type: 'DELETE',
                    url: 'products/' + id,
                    dataType: 'json',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        record: record -= 1,
                    },
                    success: function (data) {
                        toastr.success('Successfully deleted Product!', 'Success Alert', {timeOut: 500});
                        $('.item' + id).remove();
                        $('#deleteModal').modal('hide');
                        if (record === 0) {
                            $('#sub-content').html('<div class="show-text mt-4 mb-4 alert-danger "><h3 class="text-center w-100 h-100 p-2">No data</h3></div>');
                            $('#deleteModal').modal('hide');
                            $('.modal-backdrop').remove();
                        }
                    }
                });
            });
        }

        return {
            delProduct: delProduct,
            deleteProduct: deleteProduct,
        }
    })();
    delProduct.delProduct();
    delProduct.deleteProduct();
});
