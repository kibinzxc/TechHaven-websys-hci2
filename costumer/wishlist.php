
<?php
session_start();
include 'dbcon.php';
$customerID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "My Wishlist"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
   
</head>
<body>
  
<?php include 'sidenav.php'; ?>

    <main class="wish-container"> 
        <h3>Wishlist</h3>
        <div class="wish-list"></div>
            <div class="product-list" id="product-list">
                <div class="product-item" data-name="Rakk Aporo RGB Gaming Mouse">
                    <div class="product-header">
                        <div class="stars">
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <div class="heart">
                            <i class="bi bi-heart"></i>
                        </div>
                    </div>
                    <img src="item.png">
                        <h5>Mouse</h5>
                        <p>Rakk Aporo RGB Gaming Mouse</p>
                        <div class="price">₱350.00</div>
                    <div class="btn-item">
                        <button class="add-cart">
                            <i class="bi bi-cart-plus-fill"></i> Add to cart 
                        </button>
                        <button class="buy">BUY NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</body>
<script>

        document.querySelectorAll('.heart i').forEach(heartIcon => {
            heartIcon.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevent the click event from bubbling up to the product item
                heartIcon.classList.toggle('bi-heart');
                heartIcon.classList.toggle('bi-heart-fill');
                heartIcon.classList.toggle('heart-filled');
            });
        });

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

        function searchProducts() {
            const searchBar = document.getElementById('search-bar');
            const filter = searchBar.value.toLowerCase();
            const products = document.querySelectorAll('.product-item');

            products.forEach(product => {
                const productName = product.getAttribute('data-name').toLowerCase();
                if (productName.includes(filter)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        document.getElementById('search-bar').addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                searchProducts();
            }
        });

        function handleProductClick(productName) {
        // Navigate to view-prod.php with the product name as a query parameter
            window.location.href = `view-prod.php?product=${encodeURIComponent(productName)}`;
        }
    
        // Add click event listeners to all product items
        document.querySelectorAll('.product-item').forEach(item => {
            item.addEventListener('click', () => {
                const productName = item.getAttribute('data-name');
                handleProductClick(productName);
            });
        });

        
    </script>
</html>