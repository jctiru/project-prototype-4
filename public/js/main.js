$(document).ready(function() {
    // Add to Cart on Shop Page
    $("#cart-button").click(function() {
        $.ajax({
            url: 'http://localhost/project-prototype-4/users/ajaxaddcart',
            type: 'POST',
            data: {
                index: $(this).data('index')
            },
            beforeSend: function() {
                startLoadingButton();
            },
            complete: function() {
                var timer;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    stopLoadingButton();
                }, 500);
            },
            success: function(data) {
                $('#cartItems').html(" " + data);
            }
        });
    });

    function startLoadingButton() {
        $('#cart-loader').show();
        $('#cart-icon').hide();
        $('#cart-button').prop('disabled', true);
    }

    function stopLoadingButton() {
        $('#cart-loader').hide();
        $('#cart-icon').show();
        $('#cart-button').prop('disabled', false);
    }
    // Preload image
    // $.preload( 'http://localhost/project-prototype-4/public/img/ajax-loader.gif');
    // Update cart via ajax
    $('#update-cart-button').click(function(e) {
        e.preventDefault();
        startBlockingCart();
        $.ajax({
            url: 'http://localhost/project-prototype-4/users/ajaxupdatecart',
            type: 'POST',
            data: $('#cart-form').serializeArray(),
            beforeSend: function() {
                startBlockingCart();
            },
            complete: function() {
                var timer;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    stopBlockingCart();
                    $("#update-cart-button").prop('disabled', true);
                }, 1000);
            },
            success: function(data) {
                // console.log(data);
                var updatedCart = JSON.parse(data);
                $('#cart-total-cost').html('P' + updatedCart.totalPrice);
                updatedCart.books.forEach(function(book) {
                    $('#bookLinePrice_'+book.id).html('P' + book.linePrice);
                });
            }
        });
    });

    // Disable and enable cart
    $.blockUI.defaults.css = {};

    function startBlockingCart() {
        $('#cart-section').block({
            message: $('#throbber')
        });
    }

    function stopBlockingCart() {
        $('#cart-section').unblock();
    }

    // Check for any input changes and enable update cart button 
    $("#cart-form :input").change(function() {
        $("#update-cart-button").prop('disabled', false);
    });
});