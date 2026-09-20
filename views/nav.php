<ul class="menu">
    <li onclick="goHome()">home</li>
    <li onclick="goCart()">cart</li>
    <li onclick="goCheckout()">checkout</li>
</ul>

<script>
    function goHome() {
        window.location.href = "./index.php?page=store";
    }

    function goCart() {
        window.location.href = "./index.php?page=cart";
    }

    function goCheckout() {
        window.location.href = "./index.php?page=checkout";
    }
</script>