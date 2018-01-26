$(document).ready(function() {

    // Add to Cart
    $(".cart-button").click(function() {
        $.ajax({
            url: 'http://localhost/project-prototype-4/users/ajaxcart',
            type: 'POST',
            data: { index: $(this).data('index') },
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
        $('.cart-button').prop('disabled', true);
    }

    function stopLoadingButton() {
        $('#cart-loader').hide();
        $('#cart-icon').show();
        $('.cart-button').prop('disabled', false);
    }

    // Preload image
    // $.preload( 'http://localhost/project-prototype-4/public/img/ajax-loader.gif');

    //Cartpage Actions
    var fadeTime = 300;
    $('.product-quantity').change(function() {
        updateQuantity(this);
    });
    $('.product-removal').click(function() {
        removeItem(this);
    });

    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.find('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;
        // console.log(linePrice);
        productRow.find('.product-lineprice').each(function() {
            $(this).fadeOut(fadeTime, function() {
                $(this).text(linePrice.toFixed(2));
                // recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });
    }

    // Disable cart
    $.blockUI.defaults.css = {}; 
    $('#block').click(function() {
        $('#cart-section').block({
            message: $('#throbber'),
            css: {
                // border: 'none',
                // padding: '15px',
                // backgroundColor: '#000',
                // '-webkit-border-radius': '10px',
                // '-moz-border-radius': '10px',
                // opacity: 0.5,
                // color: '#fff'
            }
        });
    });

    $('#unblock').click(function() {
        $('#cart-section').unblock();
    });

});