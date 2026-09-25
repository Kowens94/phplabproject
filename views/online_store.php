<link rel="stylesheet" href="./styles/layout.css">
<div class="product-grid">
<?php
    // Fetch all products from the database
    $sql = "SELECT * FROM product_list";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()):
?>
    <aside class="p-card">
        <div class="p-wrapper">

            <figure class="p-image">
                <img src="./assets/products/<?php echo htmlspecialchars($row['image']); ?>" alt="">
            </figure>

            <section class="p-info">
                <div class="p-type">
                    <?php echo $row['product_id']; ?>
                </div>

                <div class="p-name">
                    <?php echo htmlspecialchars($row['product_name']); ?>
                </div>

                <div class="p-type">
                    <?php echo htmlspecialchars($row['product_description']); ?>
                </div>

                <div class="p-type">
                    Price: $<?php echo number_format($row['product_cost'], 2); ?>
                </div>

                <div class="purchase-row">
                    <form action="./controller/add_to_cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['product_id']); ?>">

                       <div class="qty-control" data-id="<?php echo $row['product_id']; ?>">
                            <button type="button" class="qty-btn" onclick="changeQty('<?php echo $row['product_id']; ?>', -1)">−</button>
                            <span class="qty-display">1</span>
                            <button type="button" class="qty-btn" onclick="changeQty('<?php echo $row['product_id']; ?>', 1)">+</button>
                        </div>

                        <button class="add-btn" type="button" 
                        onclick="addToCart('<?php echo $row['product_id']; ?>')">Add To Cart</button>
                    </form>
                </div>
            </section>
        </div>
    </aside>
<?php endwhile; ?>
</div>
