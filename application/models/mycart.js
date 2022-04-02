$(document).ready(function(){
    showMyCart();

    $(".add-to-cart").on("click", function(e)
    {
        e.preventDefault();

        let cartQty = $('.cart-qty').text() ? $('.cart-qty').text():0;
        cartQty++;
        $('.cart-qty').text(cartQty);

        let id = $(this).data('id');
        $.ajax({
            async: false,
            type: "POST",
            url: "/application/controllers/cart.php",
            dataType: "text",
            data: {cart: 'add', id: id},
            error: function(){
                alert("error");
            },
            success: function(res){
                
            }
        });
    });

    $("#in-check").on("click", ".clear-cart", function(e)
    {
        $.ajax(
        {
            async: false,
            type: "POST",
            url: "/application/controllers/cart.php",
            dataType: "text",
            data: {cart: 'clear'},
            error: function(){
                alert("error");
            },
            success: function(res){
                showMyCart();
            }
        });
    });
    
    $('#in-check').on("click", ".delete-to-cart", function(e)
    {
        e.preventDefault();

        let id = $(this).data('id');
        $.ajax({
            async: false,
            type: "POST",
            url: "/application/controllers/cart.php",
            dataType: "text",
            data: {cart: 'del', id: id},
            error: function(){
                alert("error");
            },
            success: function(res){
                showMyCart();
            }
        });
    });
    
    function showMyCart()
    {
        $.ajax(
        {
            async: false,
            type: "POST",
            url: "/application/controllers/cart.php",
            data: {cart: 'show'},
            dataType: "text",
            error: function(){
                alert("Произошла ошибка при добавлении товара");
            },
            success: function(res){
                $('.in-check').html(res);
            }
        });
    }
});
