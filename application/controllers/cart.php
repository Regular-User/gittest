<?php
    error_reporting(-1);
    if(!isset($_SESSION))
    {
        session_start();
    }
    require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/bd.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/funcs.php';
    if(isset($_POST['cart']))
    {  
        
        switch($_POST['cart'])
        {
            case 'add':
                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
                $product = get_product($id);

                if(!$product)
                {
                    echo json_encode(['code' => 'error', 'answer' => 'Error product']);
                }

                else
                {
                    add_to_cart($product);
                    ob_start();
                    require __DIR__.'/../views/checkout.php';
                    $cart = ob_get_clean();
                }

                break;
                
            case 'clear':
                clear_cart();

                break;

            case 'show':
                require __DIR__."/../views/product.php";
                
                break;
                
            case 'del':
                $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
                $product = get_product($id);

                Del($product);

                break;
             
        }
    }    