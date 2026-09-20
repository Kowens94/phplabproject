<?php
require("mysqli_connect.php");

// Clear the cart
$sql = "DELETE FROM shopping_cart";
$conn->query($sql);

// Redirect to purchase complete page
header("Location: ../index.php?page=purchase_complete");
exit;
