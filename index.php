<?php
    error_reporting(-1);
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
    <title>Каталог</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>

        <div class="header">
            <div class="sort">
                <div class="sort inputs-cont" id="sort">
                    <label for="" class="inputs">
                        <span>Сортировать от a-z</span>
                        <input id="sort-name" type="checkbox" name="sort" value="a-z" style="margin-left:10px">
                    </label>

                    <label class="min-cont inputs">
                        <span>По минимальной цене</span>
                        <input id="min" type="checkbox" name="max-min" value="min">
                    </label>
                    
                    <label class="max-cont inputs">
                        <span>По максимальной цене</span>
                        <input id="max" type="checkbox" name="max-min" value="max"> 
                    </label>
                </div>
            </div>
            <div class="cart"><a href="/application/views/checkout.php">Корзина</a> <span class="cart-qty"><?= $_SESSION['cart.qty'] ?? 0 ?></span></div>
        </div>

    </header>

    <div class="wrapper">
        <div class="products">
            <?php if(!empty($products)):?>
                <?php if(isset($_SESSION['rev']) == 1):
                    krsort($products);
                endif;?>
                <div class="products-sort">
                    <?php foreach($products as $product): ?> 
                    <div class="productCart">
                        <h1 class="product-title"><?= $product['title']?></h1>
                        <div class="product-img"><img src="./img/<?= $product['img']?>" alt=""></div>
                        <div class="product-price"><?= $product['price'];?> рублей.</div>
                        <a href="#" class="add-to-cart" data-id="<?=$product['id'];?>">Купить</a>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                
        </div>
    </div>
    
                    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/application/models/mycart.js"></script>
    <script src="/application/models/sort.js"></script>
</body>
</html>