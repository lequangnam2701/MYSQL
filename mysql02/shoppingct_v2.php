<?php
session_start();

$products = array(
    array("id" => 1, "name" => "ao polo", "price" => 25),
    array("id" => 2, "name" => "quan jeans", "price" => 50 ),
    array("id" => 3, "name" => "giay Sneakers", "price" => 40),
    
);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();

}

function addToCart($productId) {
    global $products;

    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $_SESSION['cart'] [] = $product;
            echo "da them" . $product['name'] . "vao gio hang.";
            return;
        }
    } 
    echo "san pham khong ton tai. ";
}

function viewCart() {
    if (empty(  $_SESSION['cart'])) {
        echo "gio hang trong. ";
    } else {
        echo "<h2> Gio hang cua hang:</h2>";
        $totalPrice = 0;

        foreach (  $_SESSION['cart'] as $item) {
            echo $item ['name'] . "- $" . $item['price'] . "<br>";
            $totalPrice += $item['price'];
        }
        echo "<strong> tong gia tri: $" . $totalPrice . "</strong>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shoppping Cart</title>
    </head>
    <body>

    <h1>Trang mua sam PHP </h1>

    <from method="post">
        <label for="productId">Chon SAn pham:</label>
        <select name= "productId" id="productId">
            <?php foreach ($products as $product); ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> - $<?php echo $product['price']; ?><option>
            <?php endforeach; ?>
</select>
<button type="submit" name="addToCart"> Them vao gio hang </button>
    </from>
    <?php
    if (isset($_POST['addToCart']) && isset($_POST['productId'])) {
        addToCart($_POST['productId']);
    }
    viewCart();
    ?>
    </body>
</html>