<?php
require_once("classes/products.php");
require_once("classes/cart.php");
session_start();

$cart = new cart();

$allProducts;
$product1 = new products(101, "football.png", 150);
$allProducts = array($product1);
$product2 = new products(102, "tennis.png", 120);
array_push($allProducts, $product2);
$product3 = new products(103, "basketball.png", 90);
array_push($allProducts, $product3);
$product4 = new products(104, "table-tennis.png", 110);
array_push($allProducts, $product4);
$product5 = new products(105, "soccer.png", 80);
array_push($allProducts, $product5);

function display($Product)
{
    global $product1;
    $product1->display($Product);
}
if (isset($_POST['id1'])) {
    foreach ($allProducts as $k => $v) {
        if ($v->id == $_POST['id1']) {
            isset($_SESSION['cart'])? $cart->getCart(($_SESSION['cart'])):$_SESSION['cart'] = array();
            $cart->addCart($v);
            $_SESSION['cart'] =$cart->reCart();
        }
    }
    echo json_encode($_SESSION['cart']);
}
if (isset($_POST['index'])) {
    $cart->getCart($_SESSION['cart']);

    $cart->updateQuantity($_POST['index'], $_POST['inp-field']);

    $_SESSION['cart'] = $cart->reCart();
    echo json_encode($_SESSION['cart']);
}
if (isset($_POST['index1'])) {
    $cart->getCart($_SESSION['cart']);

    $cart->deleteProduct($_POST['index1']);

    $_SESSION['cart'] = $cart->reCart();
    echo json_encode($_SESSION['cart']);
}
if (isset($_POST['empty'])) {
    $cart->emptyCart();

    $_SESSION['cart'] = $cart->reCart();
    echo json_encode($_SESSION['cart']);
}