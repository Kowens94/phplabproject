<?php
require("mysqli_connect.php");

if (!isset($_POST['product_id'])) {
    exit("Invalid request");
}

$product_id = $_POST['product_id'];

$sql = $conn->prepare("DELETE FROM shopping_cart WHERE product_id = ?");
$sql->bind_param("s", $product_id);
$sql->execute();

header("Location: ../index.php?page=cart");
exit;
?>