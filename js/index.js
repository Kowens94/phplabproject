function addToCart(productId) {
    const control = document.querySelector(`.qty-control[data-id="${productId}"]`);
    const qty = control.querySelector(".qty-display").textContent;

    fetch('./controller/add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}&qty=${qty}`
    })
    .then(res => res.json())
    .then(data => {
        showToast("Added to cart!");
        updateCartCount();   // ⭐ live update
    });
}



function changeQty(productId, delta) {
    const control = document.querySelector(`.qty-control[data-id="${productId}"]`);
    const display = control.querySelector(".qty-display");

    let qty = parseInt(display.textContent);

    qty += delta;

    // ⭐ Prevent negative quantities
    if (qty < 0) qty = 0;

    display.textContent = qty;
}



function showToast(message) {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.style.opacity = "1";

    setTimeout(() => {
        toast.style.opacity = "0";
    }, 2000);
}
function updateQty(productId, delta) {
    fetch('/phplabproject/controller/update_quantity.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}&delta=${delta}`
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {

            // If item removed
            if (data.qty === 0) {
                const item = document.querySelector(`.qty-control[data-id="${productId}"]`)
                    .closest('.cart-item');
                item.remove();
                location.reload();
                return;
            }

            // Update quantity display
            const control = document.querySelector(`.qty-control[data-id="${productId}"]`);
            const display = control.querySelector(".qty-display");
            display.textContent = data.qty;

            location.reload();
        }
    });
}

function updateCartCount() {
    fetch('./controller/get_cart_count.php')
        .then(res => res.json())
        .then(data => {
            document.getElementById("cart-count").textContent = data.count;
        });
}


document.addEventListener("DOMContentLoaded", updateCartCount);
