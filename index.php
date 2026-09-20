<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyah Music Store</title>

    <!-- Unified Styles -->
    <link rel="stylesheet" href="./styles/common.css">
    <link rel="stylesheet" href="./styles/layout.css">
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
    <div class="container">

        <!-- Header -->
        <header class="site-header">
            <?php include("./views/header.php"); ?>
        </header>

        <!-- Main Content -->
        <main class="site-main">
            <?php
                // Determine which page to load
                $page = $_GET['page'] ?? 'store';

                switch ($page) {
                    case 'cart':
                        include("./views/cart.php");
                        break;

                    case 'checkout':
                        include("./views/checkout.php");
                        break;

                    case 'purchase_complete':
                        include('./views/purchase_complete.php');
                        break;

                    default:
                        include("./views/online_store.php");
                        break;
                }
            ?>
        </main>

        <!-- Footer -->
        <footer class="site-footer">
            <?php include("./views/footer.php"); ?>
        </footer>

    </div>
</body>
</html>
