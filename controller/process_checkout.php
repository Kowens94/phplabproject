<?php
require("mysqli_connect.php");

$sql = "DELETE FROM shopping_cart";
$conn->query($sql);

header("Location: ../index.php?page=purchase_complete");
exit;
?>