product = $('#product').val();
public_path = $('#public_path').val();

// add a new post
$(document).on('click', '.add-modal', function() {
    $('.modal-title').text('Add');
    $('#addModal').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajax({
        type: 'POST',
        url: 'posts',
        data: {
            '_token': $('input[name=_token]').val(),
            'title': $('#title_add').val(),
            'content': $('#content_add').val()
        },
        success: function(data) {
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                $('#postTable').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + " '></td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                $('.new_published').iCheck({
                    checkboxClass: 'icheckbox_square-yellow',
                    radioClass: 'iradio_square-yellow',
                    increaseArea: '20%'
                });
                $('.new_published').on('ifToggled', function(event){
                    $(this).closest('tr').toggleClass('warning');
                });
                $('.new_published').on('ifChanged', function(event){
                    id = $(this).data('id');
                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('changeStatus') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': id
                        },
                        success: function(data) {
                            // empty
                        },
                    });
                });
            }
        },
    });
});

// Show a post
$(document).on('click', '.show-modal', function() {
    $('.modal-title').text('Show');
    $('#id_show').val($(this).data('id'));
    $('#title_show').val($(this).data('title'));
    $('#content_show').val($(this).data('content'));
    $('#showModal').modal('show');
});

// Edit a title
$(document).on('click', '.edit-title-modal', function() {
    $('.modal-title').text('Edit product title');
    $('#product_name_edit').val($('#product_name').val());
    $('#editDescriptionModal').modal('show');
});

$('.modal-footer').on('click', '.update-title-button', function() {
    $.ajax({
        type: 'PUT',
        url: 'update/title/',
        data: {
            '_token': $('input[name=_token]').val(),
            'product_name': $("#product_name_edit").val(),
        },
        success: function(data) {
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#editModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.product_name) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.product_name[0]);
                }
            } else {
                toastr.success('Successfully title!', 'Success Alert', {timeOut: 5000});
                //Success actions
                $("#product_name").val(data.product_name);
            }
        }
    });
});

// Edit a description

$('.form-group').on('click', '.update-description-button', function() {
    $.ajax({
        type: 'PUT',
        url: 'update/description',
        data: {
            '_token': $('input[name=_token]').val(),
            'product_description': $("#product_description").val(),
        },
        success: function(data) {
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.product_description) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.product_description[0]);
                }
            } else {
                toastr.success('Successfully title!', 'Success Alert', {timeOut: 5000});
                //Success actions
                $("#product_description").val(data.product_description);
            }
        }
    });
});

// delete a image
var imageName;
function deletePicture(element) {

    imageName = element.id;

    $('.modal-title').text('Delete image');

    $("#image_name").attr('src', public_path+'/'+imageName);

    $('#deleteImageModal').modal('show');
}

$('.modal-footer').on('click', '.delete-product-image', function() {
    $.ajax({
        type: 'DELETE',
        url: 'delete/image',
        data: {
            '_token': $('input[name=_token]').val(),
            'image_name': imageName,
        },
        success: function(data) {
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.image_name) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.image_name[0]);
                }
            } else {
                toastr.success('Image deleted successful!', 'Success Alert', {timeOut: 5000});
                //Success actions
                var delClass = imageName.slice(0,-4)
                $('#'+delClass).remove();
            }
        }
    });
});