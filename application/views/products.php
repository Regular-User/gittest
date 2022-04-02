<?php
    error_reporting(-1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/bd.php';
    $products = get_products();
?>


<?php foreach($products as $product): ?> 
    <div class="productCart">
        <h1 class="product-title"><?= $product['title']?></h1>
        <div class="product-img"><img src="./img/<?= $product['img']?>" alt=""></div>
        <div class="product-price"><?= $product['price'];?> рублей.</div>
        <a href="" class="add-to-cart" data-id="<?=$product['id'];?>">Купить</a>
    </div>
<?php endforeach;?>
