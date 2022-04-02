<?php ?>
<?php if(isset($_SESSION['cart'])): ?>
    <?php if($_SESSION['cart']):?>
        
        Товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span> <br> Сумма: <?= $_SESSION['cart.sum'] ?> рублей <br>
        <button class="clear-cart" id="#clear-cart">Очистить корзину</button>
        
        <?php foreach($_SESSION['cart'] as $id => $item):?>
            <div class="productCart">
                <h1 class="product-title"><?= $item['title']?></h1>
                <div class="product-img"><img src="/../../img/<?= $item['img']?>" alt=""></div>
                <div class="product-price"><?= $item['price'];?> рублей.</div>
                <div class="qty"><?= $item['qty']?></div>
                <div class="buttons">
                    <a href="#" class="delete-to-cart" data-id="<?= $id?>">Удалить</a>
                </div>
            </div>
        <?php endforeach;?>
        
    <?php endif;?>
<?php else: ?>
    <p>Корзина пуста</p>
<?php endif;?>
