$(document).ready(function () {

    // For csrf - Laravel documentation
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.addToProfileBtn').click(function (e) {
        e.preventDefault();

        $('#addBookProfile').submit();

        //var book_id = $(this).closest('.book_data').find('.books_id').val();

        /*$.ajax({
            method: "POST",
            url: "/add-to-profile",
            data: {
                'book_id': book_id,
            },
            success: function (response) {
                swal(response.status);
            }
        });*/
    });

});