<?php

$products =  array(
    array("id" => 1, "name" => "ao polo", "price" => 25),
    array("id" => 2, "name" => "quan jeans", "price" => 50 ),
    array("id" => 3, "name" => "giay Sneakers", "price" => 40),
    
);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();

}
function addToCart($productId)
{
    global $products;

    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $_SESSION['cart'] [] = $product;
            echo "da them" . $product['name'] . "vao gio hang.";
            return;
        }
    }
    echo "San pham khong ton tai.";
}

function viewCart()
{
    if (empty(  $_SESSION['cart'])) {
        echo "gio hang trong.";
    }else {
        echo "<h2> Gio hang cua ban:</h2>";
        $totalPrice = 0;

        foreach (  $_SESSION['cart '] as $item) {
            echo $item['name'] . " - $" . $item['price'] . "<br>";
            $totalPrice += $item['price'];
        }
        echo "<strong> tong gia tri: $" . $totalPrice . "</strong";

    } 
}

addToCart(1);
addToCart(2);
viewCart();