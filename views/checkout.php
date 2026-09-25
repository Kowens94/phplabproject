<link rel="stylesheet" href="./styles/layout.css">
<?php
require __DIR__ . "/../controller/mysqli_connect.php";

$sql = "SELECT * FROM shopping_cart";
$result = $conn->query($sql);

$total = 0;
while ($row = $result->fetch_assoc()) {
    $total += ($row['product_cost'] * $row['quantity']);
}
?>

<div class="checkout-container">
    <h1>Checkout</h1>
    <p>Total Due: $<?php echo number_format($total, 2); ?></p>

    <form action="/phplabproject/controller/process_checkout.php" method="POST">
        <button class="confirm-btn">Confirm Purchase</button>
    </form>
</div>

<script>
function confirmPurchase() {
    alert("Purchase confirmed!");
}
</script>
