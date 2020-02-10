var addProduct = (function () {

    "use strict"

    var nStr = '';
    var str = '';

    function resetSpanError() {
        $('.content-error').html('')
        $('#span-detail').html('')
        $('#span-product_name').html('')
        $('#span-cat_id').html('')
        $('#span-price').html('')
    }

    function resetInputAdd() {
        $('#cat_id').val('')
        $('#product_name').val('')
        $('#price-add').val('')
        $('#detail').val('')
    }

    function addCommas(nStr) {
        nStr += '';
        let x = nStr.split('.');
        let x1 = x[0];
        let x2 = x.length > 1 ? '.' + x[1] : '';
        let rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    };

    function stringConnection(str) {
        let string = '';
        let subStr = str.split(',');
        for (var i = 0; i < subStr.length; i++) {
            string += subStr[i];

        }
        return string;
    };

    function showModalAddProduct() {
        $(document).on('click', '.add_new', function () {
            $('#modal-add-product').modal('show');
            $('#price-add').on('keyup', function () {
                let input = $('#price-add').val();
                let subInput = stringConnection(input)
                $('#price-add').val(addCommas(subInput));
            });
        });
    }

    function submitFormAddProduct() {
        $('#form-add').submit(function (e) {
            console.log('aaa');
            e.preventDefault();
            let data = new FormData();
            data.append('_token', $('meta[name="csrf-token"]').attr('content'));
            data.append('cat_id', $('#cat_id').val());
            data.append('product_name', $('#product_name').val());
            data.append('price', stringConnection($('#price-add').val()));
            data.append('detail', $('#detail').val());
            resetSpanError();
            $.ajax({
                type: 'post',
                url: '/admin/products',
                data: data,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#modal-add-product').modal('hide');
                    resetInputAdd();
                    toastr.success(response.message);
                    $('#body-table-product > tr:first').before(`<tr class="item` + response.product.id + `">
                        <td>` + response.product.id + `</td>
                        <td>` + response.product.product_name + `</td>
                        <td>` + addCommas(response.product.price) + `</td>
                        <td>` + response.cat_name + `</td>
                        <td>
                        <button class="btn btn-info edit-product" id="edit-product" data-id="` + response.product.id + `">Edit
                        </button>
                        <button type="button" class="btn btn-danger del-product" data-id="` + response.product.id + `" 
                        id="delproduct" data-toggle="modal" data-target="#deleteModal" data-record="` + response.product.length + `">Delete
                        </button>
                        </td>
                        </tr>`);
                },
                error: function (jq, status, throwE) {
                    if (jq.status == 422) {
                        jQuery.each(jq.responseJSON.errors, function (key, value) {
                            $('#span-' + key + '').html('<p style ="color:red;">' + value + '</p>');
                            toastr.error(value);

                        })
                    } else if (jq.status == 500) {
                        toastr.error(jq.responseJSON.message);
                    }

                }
            })
        })
    }

    return {
        stringCustom: stringConnection,
        numberFormat: addCommas,
        resetInputAddNew: resetInputAdd,
        resetSpanErrorValidation: resetSpanError,
        showModalAdd: showModalAddProduct,
        submitFormAdd: submitFormAddProduct,
    }
})();

addProduct.showModalAdd();
addProduct.submitFormAdd();
