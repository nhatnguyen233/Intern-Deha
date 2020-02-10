$(document).ready(function () {
    let addCategory = (function () {
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        function removeError() {
            $("body").click(function () {
                $('.error').text("");
                $('#cat_name').removeClass("border border-danger");
            })
            $(document).on('click', '#addCategory', function () {
                $('.name-category').val("");
            })
        }

        function addCat() {
            $(document).on('click', '#add-cate', function (event) {
                $.ajax({
                    url: 'categories/',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#table').serialize(),
                    success: function (data) {
                        toastr.success(data.success, "Thông báo", {
                            timeOut: 5000
                        });
                        let html = `<tr class="item` + data.category.id + `">
                                <td>` + data.category.id + `</td>
                                <td>` + data.category.cat_name + `</td>
                                <td>
                                    <button class="btn btn-info edit-category" data-toggle="modal" data-target="#editCategory" data-id="` + data.category.id + `">Edit</button>
                                    <button class="btn btn-danger edit-category" data-id="` + data.category.id + `"  data-toggle="modal" data-target="#exampleModalCenter">Delete</button>
                                </td>
                            </tr>`
                        $("#addcategory").modal("hide");
                        let append = $('#table-categories').prepend(html);
                        if (append) {
                            $('#noData').hide();
                        }
                    },
                    error: function (data) {
                        $('#cat_name').addClass("border border-danger");
                        let error = $.parseJSON(data.responseText);
                        $(".error").show();
                        $(".error").text(error.errors.cat_name);
                    }
                })
            })
        }

        return {
            ajaxSetup: ajaxSetup,
            removeError: removeError,
            addCat: addCat
        }
    })();
    addCategory.ajaxSetup();
    addCategory.removeError();
    addCategory.addCat();
});
