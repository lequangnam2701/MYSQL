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
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <style>
        body {
            padding: 20px;
        }

        h1, h2 {
            color: #007bff;
        }
        from {
            margin-bottom: 20px;
        }
        button {
            margin-top: 10px;
        }
        p {
            margin-bottom: 0;
        }
      </style>
    </head>
    <body>
        <div class="container">
        <h1>Trang mua sam PHP </h1>

        <from method="post" class="from-inline">
            <div class="from-group mr-2">
                <lable for="productId">Chon san pham:</lable>
                <select namne="productId" id="productId" class="from-control">
                    <?php foreach($products as $product):  ?>               
                        <option valuse="<?php echo $product['id']; ?>"><?php echo $product['name']; ?> - $<?php echo $product['price']; ?></option>
       <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="addToCart" class="btn btn-primary">them vao gio hang</button>
        </from>
        <?php
        if (isset($_POST['addToCart']) && isset($_POST['productId'])){
            addToCart($_P['productId']);
        }
        viewCart();
        ?>
        </div>
        <!-- Bootstrap JS and dependencies -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>