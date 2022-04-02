<?php
error_reporting(-1);
if(!isset($_SESSION))
{
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/funcs.php';

if(isset($_GET['sort']))
{
    switch($_GET['sort'])
    {
        case 'show':
            require __DIR__."/../views/products.php";
            break;

        case 'rev':
            sort_rev();
            break;

        case 'clear':
            sort_clear();
            break;
    }
}