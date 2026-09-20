<?php
require("./controller/mysqli_connect.php");

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

    <form action="controller/clear_cart.php" method="POST">
        <button class="confirm-btn">Confirm Purchase</button>
    </form>
</div>

<script>
    function confirmPurchase() {
        alert("Purchase confirmed!");
    }
</script>
