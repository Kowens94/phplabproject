<main class="site-main">
    <div class="purchase-complete">
        <h1>Thank You For Your Purchase!</h1>
        <p>Your order has been completed successfully.</p>

        <button onclick="goHome()" class="back-btn">Return to Catalog</button>
    </div>
</main>

<script>
function goHome() {
    window.location.href = "index.php?page=catalog";
}
</script>
