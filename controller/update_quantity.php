<?php
require("mysqli_connect.php");

$product_id = $_POST['product_id'];
$delta = intval($_POST['delta']);

// Get current quantity
$sql = "SELECT quantity FROM shopping_cart WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error"]);
    exit;
}

$row = $result->fetch_assoc();
$newQty = $row['quantity'] + $delta;

// Prevent negative quantities
if ($newQty < 0) $newQty = 0;

// If quantity becomes 0, remove item
if ($newQty === 0) {
    $delete = $conn->prepare("DELETE FROM shopping_cart WHERE product_id = ?");
    $delete->bind_param("s", $product_id);
    $delete->execute();

    echo json_encode(["status" => "success", "qty" => 0]);
    exit;
}

// Update quantity
$update = $conn->prepare("UPDATE shopping_cart SET quantity = ? WHERE product_id = ?");
$update->bind_param("is", $newQty, $product_id);
$update->execute();

// Return JSON
echo json_encode(["status" => "success", "qty" => $newQty]);
exit;
?>
