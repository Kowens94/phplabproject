<div class="product-grid">
<?php
    require('./controller/mysqli_connect.php'); // DB connection

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

                        <select name="qty" class="qty-select">
                            <option value="1">Qty: 1</option>
                            <option value="2">Qty: 2</option>
                            <option value="3">Qty: 3</option>
                            <option value="4">Qty: 4</option>
                            <option value="5">Qty: 5</option>
                        </select>

                        <button class="add-btn" type="submit">Add To Cart</button>
                    </form>
                </div>
            </section>

        </div>
    </aside>
<?php endwhile; ?>
</div>

