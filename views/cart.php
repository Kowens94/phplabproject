<link rel="stylesheet" href="./styles/layout.css">
<div>
<?php
require __DIR__ . "/../controller/mysqli_connect.php";

// Fetch cart items
$sql = "SELECT * FROM shopping_cart";
$result = $conn->query($sql);

// Totals
$total = 0;
$total_items = 0;
?>

    <div class="cart-container">
        <h1>Your Cart</h1>

        <div class="cart-items">
        <?php while ($row = $result->fetch_assoc()): ?>

            <?php
                $subtotal = $row['product_cost'] * $row['quantity'];
                $total += $subtotal;
                $total_items += $row['quantity'];
            ?>

            <div class="cart-item">
                <div class="item-info">
                    <div class="item-id"><?php echo htmlspecialchars($row['product_id']); ?></div>
                    <div class="item-name"><?php echo htmlspecialchars($row['product_name']); ?></div>
                    <div class="item-desc"><?php echo htmlspecialchars($row['product_description']); ?></div>
                    <div class="item-price">Price: $<?php echo number_format($row['product_cost'], 2); ?></div>

                    <div class="qty-control" data-id="<?php echo $row['product_id']; ?>">
                        <button type="button" class="qty-btn" onclick="updateQty('<?php echo $row['product_id']; ?>', -1)">−</button>
                        <span class="qty-display"><?php echo $row['quantity']; ?></span>
                        <button type="button" class="qty-btn" onclick="updateQty('<?php echo $row['product_id']; ?>', 1)">+</button>
                    </div>

                    <div class="item-subtotal">
                        Subtotal: $<?php echo number_format($subtotal, 2); ?>
                    </div>
                </div>

                <form action="/phplabproject/controller/remove_item.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <button class="remove-btn" style="margin-bottom: 15px;">Remove</button>
                </form>
                
            </div> 

        <?php endwhile; ?>
    </div> 

        <?php
            // Final totals
            $tax = $total * 0.05;          // 5% tax
            $shipping = $total * 0.10;     // 10% shipping
            $order_total = $total + $tax + $shipping;
        ?>

        <div class="cart-summary">

            <div class="summary-line">
                <span>Total Items Ordered:</span>
                <span><?php echo $total_items; ?></span>
            </div>

            <div class="summary-line">
                <span>Pre‑Tax Total:</span>
                <span>$<?php echo number_format($total, 2); ?></span>
            </div>

            <div class="summary-line">
                <span>Tax (5%):</span>
                <span>$<?php echo number_format($tax, 2); ?></span>
            </div>

            <div class="summary-line">
                <span>Shipping & Handling (10%):</span>
                <span>$<?php echo number_format($shipping, 2); ?></span>
            </div>

            <div class="summary-line total">
                <span>Order Total:</span>
                <span>$<?php echo number_format($order_total, 2); ?></span>
            </div>

        </div>

            
        <!-- Checkout Button -->
        <button class="checkout-btn" onclick="checkout()">Check Out</button>

        <!-- Return to Catalog -->
        <button class="catalog-btn" onclick="goCatalog()">Return to Catalog</button>

        <form action="/phplabproject/controller/clear_cart.php" method="POST">
            <button class="clear-cart-btn">Clear Cart</button>
        </form> 
        
    </div>

</div>
<script>
// Checkout 
function checkout() {
    window.location.href = "index.php?page=checkout";
}

// Return to catalog
function goCatalog() {
    window.location.href = "index.php?page=catalog";
}
</script>
