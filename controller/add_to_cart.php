<?php
require("mysqli_connect.php");

if (!isset($_POST['product_id']) || !isset($_POST['qty'])) {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

$product_id = $_POST['product_id'];
$qty = intval($_POST['qty']);

// Fetch product info
$sql = "SELECT * FROM product_list WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "Product not found"]);
    exit;
}

$product = $result->fetch_assoc();

// Check if item already exists in cart
$check = $conn->prepare("SELECT quantity FROM shopping_cart WHERE product_id = ?");
$check->bind_param("s", $product_id);
$check->execute();
$existing = $check->get_result();

if ($existing->num_rows > 0) {
    // Update quantity
    $update = $conn->prepare("UPDATE shopping_cart SET quantity = quantity + ? WHERE product_id = ?");
    $update->bind_param("is", $qty, $product_id);
    $update->execute();
} else {
    // Insert new item
    $insert = $conn->prepare("
        INSERT INTO shopping_cart (product_id, product_name, product_description, product_cost, quantity)
        VALUES (?, ?, ?, ?, ?)
    ");
    $insert->bind_param(
        "sssdi",
        $product['product_id'],
        $product['product_name'],
        $product['product_description'],
        $product['product_cost'],
        $qty
    );
    $insert->execute();
}

// AJAX response
echo json_encode(["status" => "success", "message" => "Item added to cart"]);
exit;
?>
