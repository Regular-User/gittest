
$(document).ready(function(){

    function showMyCart()
    {
        $.ajax(
        {
            async: false,
            type: "GET",
            url: "/application/controllers/sort.php",
            dataType: "text",
            data: {sort: 'show'},
            error: function(){
                alert("Произошла ошибка при добавлении товара");
            },
            success: function(res){
                alert(res);
                $('.products-sort').html(res);
            }
        });
    }

    $('#sort input:checkbox').click(function()
    {
        if ($(this).is(':checked')) 
        {
            $('#sort input:checkbox').not(this).prop('checked', false);
        }
        else if($('#sort-name').prop('checked') != 'checked')
        {
            $.ajax(
                {
                    type: "GET",
                    url: "/application/controllers/sort.php",
                    dataType: "text",
                    data: {sort: 'clear'},
                    success: function()
                    {
                        showMyCart();
                    },
                    error: function()
                    {
                        alert("ошибка запроса");
                    }
                });
        }
    });


    $('#sort input:checkbox').is("not:checked")
    {
        $.ajax(
            {
                type: "GET",
                url: "/application/controllers/sort.php",
                dataType: "text",
                data: {sort: 'clear'},
                success: function()
                {
                    showMyCart();
                },
                error: function()
                {
                    alert("ошибка запроса");
                }
            });
    }

    $("#sort input:checkbox").change(function(e)
    {
        e.preventDefault();
        if($("#sort-name").is(":checked"))
        {
            $.ajax(
            {
                type: "POST",
                url: "/application/controllers/sort.php",
                dataType: "text",
                data: {sort: 'rev', rev: 1},
                success: function()
                {
                    showMyCart();
                },
                error: function()
                {
                    alert("ошибка запроса");
                }
            });
        }


        else if($("#min").is(":checked"))
        {
            $.ajax(
            {
                type: "GET",
                url: "/application/controllers/sort.php",
                dataType: "text",
                data: {sort: 'sort'},
                error: function()
                {
                    alert("ошибка запроса");
                }
            });
        }
        else if($("#max").is(":checked"))
        {
            $.ajax(
            {
                type: "GET",
                url: "/application/controllers/sort.php",
                dataType: "text",
                data: {sort: 'sort'},
                error: function()
                {
                    alert("ошибка запроса");
                }
            });
        }
    });

});
