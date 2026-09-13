<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyah Music Store</title>
    <link rel="stylesheet" href="./styles/common.css">
    <link rel="stylesheet" href="./styles/layout.css">
</head>
<body>

    <div id="app">
        <h1>Riyah's Music Wholesale</h1>

        
        <button class="cart-btn" onclick="goCart()">View Cart</button>

       
        <iframe id="storeFrame"
                src="./View/online_store.html"
                style="height: calc(100vh - 120px); width: 100%; margin-top: 20px;">
        </iframe>
    </div>

    <script>
        function goCart() {
            document.getElementById("storeFrame").src = "./View/cart.html";
        }
    </script>

</body>
</html>
