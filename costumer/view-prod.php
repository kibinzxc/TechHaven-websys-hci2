<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "View Product"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <?php include 'sidenav.php'; ?>

    <main>
        <div class="product-container">
            <div class="product-images">
                <div class="main-image">
                    <img src="../costumer/main-item.png" alt="Rakk Alkus RGB Gaming Mouse">
                </div>
                <div class="thumbnail-images">
                    <img src="../costumer/item-side.png" alt="Rakk Alkus RGB Gaming Mouse">
                    <img src="../costumer/item-side2.png" alt="Rakk Alkus RGB Gaming Mouse">
                    <img src="../costumer/item-front.png" alt="Rakk Alkus RGB Gaming Mouse">
                </div>
            </div>
            <div class="product-info">
                <h1>Rakk Alkus RGB Gaming Mouse</h1>
                <div class="prices">₱ 895.00</div>
                    <div class="seperator"></div>
                    <div class="quantity">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                    </div>
                    <div class="categories">
                        <h4>Categories: Mouse</h4>
                    </div>
                    <div class="shipping">
                        <h3>Shipping Information</h3>
                        <p>Shipping: Free shipping within the Philippines.</p>
                    </div>
                    <div class="rating">
                        <h3>Product Ratings</h3>
                        <p>Rated 4.5 stars based on 100 reviews.</p>
                    </div>
                <div class="buttons">
                    <button class="add-to-cart">Add to Cart</button>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
        </div>

        <div class="product-details">
            <h2>Product Description</h2>
            <p></p>

            <h2>Product Specification</h2>
            <ul>

            </ul>
        </div>

        <div class="customer-reviews">
            <h2>Customer Ratings & Reviews</h2>

        </div>

        <div class="related-items">
            <h2>Related Items</h2>

        </div>
    </main>

    <script>
        const toggle = document.getElementById('dark-mode-toggle');
        const logo = document.getElementById('logo');

        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.classList.add('rotate');
            if (document.body.classList.contains('dark-mode')) {
                toggle.classList.remove('bi-moon-fill');
                toggle.classList.add('bi-sun-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            } else {
                toggle.classList.remove('bi-sun-fill');
                toggle.classList.add('bi-moon-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            }
            setTimeout(() => {
                toggle.classList.remove('rotate');
            }, 400);
        });
    </script>
</body>
</html>