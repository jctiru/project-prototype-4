// Add to Cart
$(".cart-button").click(function() {
    $.ajax({
        url: 'http://localhost/project-prototype-4/users/ajaxcart',
        type: 'POST',
        data: { index: $(this).data('index') },
        success: function(data) {
            $('#cartItems').html(" " + data);
            console.log(data);
        }
    });

});

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