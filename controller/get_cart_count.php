<?php
require("mysqli_connect.php");

$sql = "SELECT SUM(quantity) AS total FROM shopping_cart";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$count = intval($row['total']);

echo json_encode(['count' => $count]);
exit;
 ?>