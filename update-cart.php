<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
include 'connection.php';

$url = "cart.php";
if (isset($_GET)) {
    $product_id = $_GET['id'];
    $action = $_GET['action'];
    $qtty = (int)$_GET['qtty'];
}
if ($action === 'empty') {
    unset($_SESSION['cart']);
}
switch ($action) {
    case "add":
        $_SESSION['cart'][$product_id] = $qtty;
        break;
    case "final" :
        $_SESSION['cart'][$product_id] = $qtty;
        $url = "checkout.php";
        break;
    case "remove":
        unset($_SESSION['cart'][$product_id]);
        break;
}
if($_SESSION['cart'][$product_id] == 0)
    unset($_SESSION['cart'][$product_id]);



header("location:".$url);
?>
