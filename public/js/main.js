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
                    $('#cart-alert').fadeIn('fast');
                    $('#cart-message').html("Cart updated");
                }, 800);
            },
            success: function(data) {
                // console.log(data);
                var updatedCart = JSON.parse(data);
                $('#cart-total-cost').html('P' + updatedCart.totalPrice);
                updatedCart.books.forEach(function(book) {
                    $('#bookLinePrice_' + book.id).html('P' + book.linePrice);
                });
                $('#cartItems').html(" " + updatedCart.totalItems);
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
    $("#cart-form").change(function() {
        $("#update-cart-button").prop('disabled', false);
    });

    // Hide alert message instead of removing in DOM
    $('#cart-alert-close').click(function() {
        $('#cart-alert').fadeOut('fast');
    });

    // Delete book row
    $('.cart-delete-button').click(function(e) {
        var bookRowId = $(this).data('index');
        e.preventDefault();
        startBlockingCart();
        var data = { 'bookRowId': bookRowId };
        $.ajax({
            url: 'http://localhost/project-prototype-4/users/ajaxdeletecart',
            type: 'POST',
            data: $('#cart-form').serialize() + '&' + $.param(data),
            beforeSend: function() {
                startBlockingCart();
            },
            complete: function() {
                var timer;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    stopBlockingCart();
                    $('#bookRowId_' + bookRowId).hide('fast', function() { $('#bookRowId_' + bookRowId).remove(); });
                    $('#cart-alert').fadeIn('fast');
                    $('#cart-message').html("Book removed from cart.");
                }, 800);
            },
            success: function(data) {
                console.log(data);
                var updatedCart = JSON.parse(data);
                if (updatedCart.cartEmpty == false) {
                    $('#cart-total-cost').html('P' + updatedCart.totalPrice);
                    $('#cartItems').html(" " + updatedCart.totalItems);
                } else {
                    $('#cart-total-cost').html('P0');
                    $('#cartItems').html(" 0");
                    $('#cart-update-footer').fadeOut(800);
                }
            }
        });
    });

    // Go back on last page of hostname on books/show.php
    $('a.back').click(function(){
        if(document.referrer.indexOf(window.location.hostname) != -1){
            // if from books/show/x page go back to books/page/x
            parent.history.back();
            return false;
        } else {
            // if from direct url input, go to shop page
            window.location.href = "http://localhost/project-prototype-4/books";
            return false;
        }
    });
});