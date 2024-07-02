<?php
session_start();
include 'dbcon.php';
$customerID = $_SESSION['id'];

// Fetch products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);

// Check if there are products available
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "View Product list"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
   
    <?php include 'sidenav.php'; ?>
    <section class="container">
        <div class="main-content">
            <div class="row">
                <div class="sort">
                    <h5>Sort By:</h5>
                    <select>
                        <option value="oldest">Oldest First</option>
                        <option value="newest">Newest First</option>
                        <option value="low-to-high">Price Low to High</option>
                        <option value="high-to-low">Price High to Low</option>
                    </select>
                </div>
                <div class="num_page">
                    <span class="current">1/10</span>
                    <button class="prev" disabled>&lt;</button>
                    <button class="next">&gt;</button>
                </div>
            </div>
            <div class="product-list" id="product-list">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-item" data-name="<?php echo htmlspecialchars($product['prod_name']); ?>" data-prod-id="<?php echo $product['prodID']; ?>" data-prod-price="<?php echo $product['prod_price']; ?>">
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
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($product['img']); ?>" alt="<?php echo htmlspecialchars($product['prod_name']); ?>">
                            <h5><?php echo htmlspecialchars($product['category']); ?></h5>
                            <p><?php echo htmlspecialchars($product['prod_name']); ?></p>
                            <div class="price">₱<?php echo number_format($product['prod_price'], 2); ?></div>
                            <div class="btn-item">
                                <button class="add-cart" data-prod-id="<?php echo $product['prodID']; ?>" data-prod-name="<?php echo htmlspecialchars($product['prod_name']); ?>" data-prod-price="<?php echo $product['prod_price']; ?>">
                                    <i class="bi bi-cart-plus-fill"></i> Add to cart 
                                </button>
                                <button class="buy">BUY NOW</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found.</p>
                <?php endif; ?>
            </div>
            <div class="page-num">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.heart i').forEach(heartIcon => {
            heartIcon.addEventListener('click', (event) => {
                event.stopPropagation();
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
            window.location.href = `view-prod.php?product=${encodeURIComponent(productName)}`;
        }

        document.querySelectorAll('.product-item').forEach(item => {
            item.addEventListener('click', () => {
                const productName = item.getAttribute('data-name');
                handleProductClick(productName);
            });
        });

        document.querySelectorAll('.add-cart').forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                const prodID = button.getAttribute('data-prod-id');
                const prodName = button.getAttribute('data-prod-name');
                const prodPrice = button.getAttribute('data-prod-price');
                const customerID = <?php echo json_encode($customerID); ?>;
                const quantity = 1;

                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ customerID, prodID, prodName, prodPrice, quantity })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product added to cart!');
                    } else {
                        alert('Failed to add product to cart.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the product to the cart.');
                });
            });
        });
    </script>
</body>
</html>