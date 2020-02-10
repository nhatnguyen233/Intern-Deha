$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var editProduct = (function () {
    "use strict"
    var id;
    var cleave = new Cleave('#price-edit', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function editModal() {
        $(document).on('click', '#edit-product', function () {
            $('#validation-errors-edit').html('');
            $('#modal-edit-category').modal('show');
            id = $(this).data('id');
            $.ajax({
                url: 'products/' + id + '/edit',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#cat-name-edit').val(data.product.cat_id);
                    $('#product-name-edit').val(data.product.product_name);
                    $('#price-edit').val(formatNumber(data.product.price));
                    $('#detail-edit').val(data.product.detail);
                }
            });
        });
    }

    function editButton() {
        $(document).on('click', '#update-product', function () {
            $.ajax({
                url: 'products/' + id,
                method: 'PUT',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                    'cat_id': $('#cat-name-edit').val(),
                    'product_name': $('#product-name-edit').val(),
                    'price': $('#price-edit').val(),
                    'detail': $('#detail-edit').val(),
                },
                success: function (data) {
                    toastr.success('Successfully update State!', 'Success Alert', {timeOut: 3000});
                    let html = `<tr class="item` + data.product.id + `">
                                <td>` + data.product.id + `</td>
                                <td>` + data.product.product_name + `</td>
                                <td>` + formatNumber(data.product.price) + `</td>
                                <td>` + data.category.cat_name + `</td>
                                <td>
                                    <button class="btn btn-info edit-product" id="edit-product" data-id="` + data.product.id + `">Edit</a>
                                    </button>
                                    <button type="button" class="btn btn-danger del-product" data-id="` + data.product.id + `" 
                        id="delproduct" data-toggle="modal" data-target="#deleteModal" data-record="` + data.product.length + `">Delete
                        </button>
                                </td>
                            </tr>`;
                    $('.item' + data.product.id).replaceWith(html);
                    $('#modal-edit-category').modal('hide');
                }
            }).fail(function (data) {
                setTimeout(function () {
                    $('#modal-edit-category').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 3000});
                }, 500);
                $('#validation-errors-edit').html('');
                $.each(data.responseJSON.errors, function (key, value) {
                    $('#validation-errors-edit').append('<div class="alert alert-danger" style="font-size: 1rem;">' + value + '</div');
                });
            });
        });
    }

    return {
        editModal: editModal,
        editButton: editButton,
    }
})();

editProduct.editModal();
editProduct.editButton();
