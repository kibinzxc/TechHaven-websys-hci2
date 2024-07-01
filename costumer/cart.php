
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "View Cart"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href=".../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
   
</head>
<body>
   
<?php include 'sidenav.php'; ?>

    <main>
        <div class="cart-container">
            <div class="cart-items">
                <h3>My Cart</h3>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: start;">Product</th>
                            <th style="text-align: end;">Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                </table>
                <div class="cart-item">
                    <div class="item-details">
                        <input type="checkbox" class="item-checkbox">
                        <div class="item-image"></div>
                        <div>
                            <h3>Gigabyte AP303 Black Gaming PC</h3>
                            <p>Php 96,000.00</p>
                        </div>
                    </div>
                    <div class="quantity-controls">
                        <button class="decrement">-</button>
                        <input type="text" value="1" class="quantity">
                        <button class="increment">+</button>
                    </div>
                    <p class="item-total">Php 96,000.00</p>
                    <button class="remove-item">X</button>
                </div>
                <!-- Add more cart items here -->
            </div>
            <div class="order-summary">
                <h2>Order Summary</h2>
                <p>Sub-total (2 items): Php 168,000.00</p>
                <p>Tax included and shipping calculated at checkout</p>
                <p>Total: Php 168,000.00</p>
                <button class="checkout-btn">Check Out</button>
            </div>
        </div>
    </main>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartItems = document.querySelectorAll('.cart-item');

            cartItems.forEach(function(item) {
                const decrementBtn = item.querySelector('.decrement');
                const incrementBtn = item.querySelector('.increment');
                const quantityInput = item.querySelector('.quantity');
                const itemTotal = item.querySelector('.item-total');
                const price = parseFloat(itemTotal.innerText.replace('Php ', '').replace(',', ''));

                decrementBtn.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value);
                    if (quantity > 1) {
                        quantity--;
                        quantityInput.value = quantity;
                        itemTotal.innerText = `Php ${(quantity * price).toLocaleString()}.00`;
                    }
                });

                incrementBtn.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value);
                    quantity++;
                    quantityInput.value = quantity;
                    itemTotal.innerText = `Php ${(quantity * price).toLocaleString()}.00`;
                });
            });
        });
    </script>
</body>
</html>