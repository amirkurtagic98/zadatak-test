$(document).ready(function () {

    // For csrf - Laravel documentation
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.addToProfileBtn').click(function (e) {
        e.preventDefault();

        var book_id = $(this).closest('.book_data').find('.books_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-profile",
            data: {
                'book_id': book_id,
            },
            success: function (response) {
                swal(response.status);
            }
        });
    });

    /*$(document).on('click', '.delete-cart-item', function (e) {  
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                loadcart();
                $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
            }
        });
    });*/

});