<?php
require __DIR__ . "/mysqli_connect.php";

$sql = "DELETE FROM shopping_cart";
$conn->query($sql);

// Redirect back to cart page
header("Location: /phplabproject/index.php?page=cart");
exit;
