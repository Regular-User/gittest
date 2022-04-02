<?php 

function debug(array $data): void
{
    echo '<pre>'.print_r($data, 1).'</pre>';
}


//--------Корзина--------//

function get_products(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM products");
    return $res->fetchAll();
}

function get_product(int $id): array|false
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_to_cart($product):void
{
    if(isset($_SESSION['cart'][$product['id']]))
    {
        $_SESSION['cart'][$product['id']]['qty'] += 1;
    }
    else
    {
        $_SESSION['cart'][$product['id']] = [
            'title' => $product['title'], 
            'price' => $product['price'], 
            'qty' => 1,
            'img' => $product['img'], 
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

function clear_cart():void
{
    if(isset($_SESSION['cart']))
    {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
    }
}

function Del($product):void
{
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $product = get_product($id);
    if(isset($product))
    {
        $count = $_SESSION['cart'][$product['id']]['qty'];
        echo $count;
        $_SESSION['cart.qty'] -= $_SESSION['cart'][$product['id']]['qty'];
        unset($_SESSION['cart'][$product['id']]);
        $_SESSION['cart.sum'] -= ($product['price'] * $count);
        if($_SESSION['cart.qty'] == 0)
        {
            unset($_SESSION['cart']);
            unset($_SESSION['cart.sum']);
        }
    }
}

//-------------------------------------------//

function sort_rev():void
{
    if(!isset($_SESSION))
    {
        session_start();
    }
    $rev = $_POST['rev'];
    $_SESSION['rev'] = $rev;
    debug($_SESSION['rev']);
}

function sort_clear():void
{
    unset($_SESSION['rev']);
}

