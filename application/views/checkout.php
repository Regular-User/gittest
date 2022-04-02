<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/bd.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/funcs.php';
    
    $products = get_products();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Корзина</title>
</head>
<body class="checkout">
    
        <div class="in-check" id="in-check">
        </div>

        
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/application/models/mycart.js"></script>
</body>
</html>