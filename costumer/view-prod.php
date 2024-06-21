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
                    <img src="path/to/main-image.jpg" alt="Rakk Alkus RGB Gaming Mouse">
                </div>
                <div class="thumbnail-images">
                    <!-- Add thumbnail images here -->
                </div>
            </div>
            <div class="product-info">
                <h1>Rakk Alkus RGB Gaming Mouse</h1>
                <div class="price">₱ 895.00</div>
                <div class="rating">
                    <!-- Add star rating here -->
                </div>
                <div class="quantity">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </div>
                <div class="buttons">
                    <button class="add-to-cart">Add to Cart</button>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
        </div>

        <div class="product-details">
            <h2>Product Description</h2>
            <p><!-- Add product description here --></p>

            <h2>Product Specification</h2>
            <ul>
                <!-- Add product specifications here -->
            </ul>
        </div>

        <div class="customer-reviews">
            <h2>Customer Ratings & Reviews</h2>
            <!-- Add customer reviews here -->
        </div>

        <div class="related-items">
            <h2>Related Items</h2>
            <!-- Add related items here -->
        </div>
    </main>

    <footer>
        <!-- Add your footer content here -->
    </footer>

    <script src="script.js"></script>
</body>
</html>