$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function () {
    let editCategory = (function () {
        $(".error").hide();
        let idGlobal;

        function removeError() {
            $("body").click(function () {
                $('.error').text("");
                $('#category_name').removeClass("border border-danger");
            });
            $(document).on('click', '#addCategory', function () {
                $('.name-category').val("");
            })
        }


        function editModal() {
            $(document).on('click', '.edit-category', function () {
                idGlobal = $(this).data('id');
                $.ajax({
                    url: 'categories/' + idGlobal + '/edit',
                    type: 'GET',
                    success: function (data) {
                        $('#category_name').val(data.cat_name);
                    }
                });
            })
        }

        function editCat() {
            $('.updateCategory').click(function () {
                $.ajax({
                    url: 'categories/' + idGlobal,
                    dataType: 'json',
                    method: 'PUT',
                    data: {
                        'cat_name': $("#category_name").val(),
                    },
                    success: function (data) {
                        toastr.success(data.success, "Notification", {
                            timeOut: 5000
                        });
                        let html = `<tr class="item` + data.category.id + `">
                                <td>` + data.category.id + `</td>
                                <td>` + data.category.cat_name + `</td>
                                <td>
                                    <button class="btn btn-info edit-category" data-toggle="modal" data-target="#editCategory" data-id="` + data.category.id + `">Edit</button>
                                     <button class="btn btn-danger" id="del-category" data-id="`+data.category.id+`"
                                       data-record="`+data.category.length+`">Delete
                                    </button>
                                </td>
                            </tr>`;
                        $("#editCategory").modal("hide");
                        $('.item' + data.category.id).replaceWith(html);
                        let a = $('item' + data.id);
                    },
                    error: function (data) {
                        $('#category_name').addClass("border border-danger");
                        let error = $.parseJSON(data.responseText);
                        $(".error").show();
                        $(".error").text(error.errors.cat_name);
                    }
                })
            })
        }

        return {
            editModal: editModal,
            editCat: editCat,
            removeError: removeError
        }
    })();
    editCategory.editModal();
    editCategory.editCat();
    editCategory.removeError();
});
