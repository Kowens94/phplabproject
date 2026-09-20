<main class="site-main">
<?php
require __DIR__ . "/../controller/mysqli_connect.php";

// Fetch cart items
$sql = "SELECT * FROM shopping_cart";
$result = $conn->query($sql);

$total = 0;
?>
<div class="cart-container">
    <h1>Your Cart</h1>

    <div class="cart-items">
        <?php while ($row = $result->fetch_assoc()): ?>

            <?php
                $subtotal = $row['product_cost'] * $row['quantity'];
                $total += $subtotal;
            ?>

            <div class="cart-item">
                <div class="item-info">
                    <div class="item-name"><?php echo htmlspecialchars($row['product_name']); ?></div>
                    <div class="item-desc"><?php echo htmlspecialchars($row['product_description']); ?></div>
                    <div class="item-price">Price: $<?php echo number_format($row['product_cost'], 2); ?></div>
                    <div class="item-qty">Quantity: <?php echo $row['quantity']; ?></div>
                    <div class="item-subtotal">Subtotal: $<?php echo number_format($subtotal, 2); ?></div>
                </div>

                <form action="controller/remove_item.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <button class="remove-btn">Remove</button>
                </form>
            </div>

        <?php endwhile; ?>
    </div>

    <div class="cart-total">
        Cart Total: $<?php echo number_format($total, 2); ?>
    </div>

    <button class="buy-btn" onclick="goCheckout()">Buy Now</button>
    <div class="checkout-link" onclick="goCheckout()">Go to Checkout Page</div>
</div>
</main>

<script>
function goCheckout() {
    window.location.href = "index.php?page=checkout";
}
</script>
