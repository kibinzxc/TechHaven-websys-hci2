<?php
session_start();
include 'dbcon.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Assuming you have a way to get the productID from your previous logic or URL parameters
$productID = $_GET['product']; // Adjust this based on how you get the product ID

// Query to fetch product details including quantity from prod_inventory table
$query = "SELECT p.*, i.qty AS available_quantity
          FROM products p
          LEFT JOIN prod_inventory i ON p.prodID = i.prodID
          WHERE p.prodID = '$productID'";
$result = $conn->query($query);

// Check if product exists
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    // Handle case where product is not found
    echo "Product not found.";
    exit();
}

// Fetch related products with the same category
$category = $product['category'];
$query_related = "SELECT * FROM products WHERE prodID != '$productID' LIMIT 5";
$result_related = $conn->query($query_related);
// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title><?php echo $product['prod_name']; ?></title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<style>
.related-items {

    justify-content: center; /* Center-align items horizontally */
    max-width: 100%; /* Ensure items don't exceed container width */
    margin: 0 auto; /* Center align within available space */
}

</style>
<body>
    <?php include 'sidenav.php'; ?>
    <main>
        <div class="product-container">
            <div class="product-images">
                <!-- Assuming you have product images stored in your database -->
                <div class="main-image">
                    <img src="../assets/img/<?php echo $product['img']; ?>" alt="<?php echo $product['prod_name']; ?>">
                </div>
                <!-- You can add more thumbnail images if needed -->
            </div>
            <div class="product-info">
                <h1><?php echo $product['prod_name']; ?></h1>
                <div class="prices">₱ <?php echo number_format($product['prod_price'], 2); ?></div>
                <div class="seperator"></div>
                <div class="categories">
                    <h4>Category: <?php echo $product['category']; ?></h4>
                </div>
                <!-- You can display additional product information here -->
                <div class="quantity">
                    <!-- Assuming you have a way to manage product quantity -->
                    <label for="quantity">Quantity:</label>
                    <div class="quantity-control">
                        <button id="decrease">-</button>
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                        <button id="increase">+</button>
                    </div>
                    <!-- Example of showing available quantity -->
                    <span class="quantity-available"><?php echo $product['available_quantity']; ?> pieces available</span>
                </div>
                <!-- Assuming you have shipping information -->
                <div class="shipping">
                    <h3>Shipping:</h3>
                    <div class="shipping-info">
                        <i class="bi bi-truck"></i>
                        <div>
                            <p>Shipping To: Metro Manila</p>
                            <p>Shipping Fee: ₱0 - ₱30</p>
                        </div>
                    </div>
                </div>
                <!-- Assuming you have product ratings and reviews -->
                <div class="rating">
                    <div class="stars">
                        <!-- Example of showing star ratings -->
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <p>4.5 (53)</p>
                    <div class="sold">
                        <i class="bi bi-cart-check"></i>
                        <span>Sold (153)</span>
                    </div>  
                </div>
                <div class="buttons">
                    <button class="add-to-cart"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
        </div>
        <div class="product-details">
            <div class="header">
                <h2>Product Description</h2>
                <!-- Example of product description -->
                <p><?php echo $product['prod_desc']; ?></p>
            </div>
            <div class="header">
                <h2>Product Specification</h2>
                <ul>
                    <!-- Example of product specifications -->
                    <li><strong>Brand:</strong> <?php echo $product['brand']; ?></li>
        
                </ul>
            </div>
            <div class="header">
                <h2>Customer Ratings & Reviews</h2>
                <div class="rating-summary">
                    <!-- Example of showing average rating -->
                    <span class="rating-average">5</span>
                    <div class="star-rating">★★★★★</div>
                    <span class="review-count">5 Reviews</span>
                </div>
            </div>
            <!-- Example of customer reviews -->
            <div class="header">
                <div class="review">
                    <div class="reviewer-info">
                        <img src="placeholder-avatar.png" class="avatar">
                        <div>
                            <strong>Juan Dela Cruz</strong>
                            <div class="star-rating">★★★★★</div>
                            <small>2023-05-28 08:00 PM</small>
                        </div>
                    </div>
                    <p>The item is in good condition and well packed. I will surely buy next time I'm hoping it will last longer. Thank you seller until next time.</p>
                </div>
                <div class="review">
                    <div class="reviewer-info">
                        <img src="placeholder-avatar.png" class="avatar">
                        <div>
                            <strong>Juan Dela Cruz Jr.</strong>
                            <div class="star-rating">★★★★★</div>
                            <small>2023-05-28 09:00 PM</small>
                        </div>
                    </div>
                    <p>Nice item, great! fully functional and fast delivery.</p>
                </div>
            </div>
        </div>
 <div class="related">
            <h3>Related Items</h3>
            <!-- Related product items fetched from database -->
            <div class="related-items">
                <?php while ($row_related = $result_related->fetch_assoc()) : ?>
                    <div class="product-item">

                            
                        <!-- Assuming you have product images stored in your database -->
                        <img src="../assets/img/<?php echo $row_related['img']; ?>" alt="<?php echo $row_related['prod_name']; ?>">
                        <h5><?php echo $row_related['category']; ?></h5>
                        <p><?php echo $row_related['prod_name']; ?></p>
                        <div class="price">₱ <?php echo number_format($row_related['prod_price'], 2); ?></div>
                        <div class="btn-item">
                            <button class="add-cart">
                                <i class="bi bi-cart-plus-fill"></i> Add to cart 
                            </button>
                            <button class="buy">BUY NOW</button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
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

        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const quantityInput = document.getElementById('quantity');

        decreaseButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        quantityInput.addEventListener('keydown', (event) => {
            event.preventDefault();
        });

    </script>
</body>
</html>