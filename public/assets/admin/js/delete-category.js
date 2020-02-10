$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Delete category use ajax
 *
 */
var deleteCategory = (function () {
    "use strict"
    var id = 0;
    var record = 0;
    var click = 0;

    function delModal() {
        $(document).on('click', '#del-category', function () {
            id = $(this).data('id');
            $('#modal-del-category').modal('show');
            if (click == 0) {
                record = $(this).data('record');
                click++;
            } else record = record;
        });
    }

    function delButton() {
        $(document).on('click', '#btn-del-category', function () {
            $.ajax({
                url: 'categories/' + id,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'record': record -= 1
                },
                success: function (id) {
                    toastr.success('Successfully deleted State!', 'Success Alert', {timeOut: 3000});
                    $('.item' + id).remove();
                    if (record == 0) {
                        let html = `<div class="div-alert">
                            <div class="alert alert-danger" role="alert">
                                No records
                            </div>
                        </div>`
                        $('.sub-content-show-table').html(html);
                    }
                    $('#modal-del-category').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                }
            });
        });
    }

    return {
        delModal: delModal,
        delButton: delButton,
    }
})();

deleteCategory.delModal();
deleteCategory.delButton();
