<?php
session_start();
error_reporting(0);
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

// Handle adding to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $prodID = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $prodPrice = $_POST['prodPrice'];
    $quantity = 1; // You can change this based on your UI logic
    $added_at = date('Y-m-d H:i:s'); // Current timestamp

    // Insert into cart table
    $insertQuery = "INSERT INTO cart (customerID, prodID, prod_name, prod_price, quantity, added_at) 
                    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iisdss", $customerID, $prodID, $prodName, $prodPrice, $quantity, $added_at);
    
    // Execute the statement
    if ($stmt->execute()) {
        $success = true;
    } else {
        $success = false;
        echo "Error: " . $stmt->error; // Display error message for debugging
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
<style>
.product-list{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(255px, 1fr));
    gap: 10px;
    margin: 0 60px;
}
.product-item {
    /* Adjust width as per your layout requirements */
    width: 250px;
    /* Ensure product items are inline-block for horizontal arrangement */
    display: inline-block;
    /* Add margin or padding to create space between products */
    margin: 10px;
    padding: 10px;

    /* Set border and border-radius for visual distinction */
    border: 1px solid #ddd;
    border-radius: 8px;
    /* Ensure product items take up vertical space evenly */
    vertical-align: top;
    /* Ensure consistent height for each product item */
    height: 400px; /* Adjust height as needed */
    /* Use flexbox for button alignment */
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Distribute space evenly between items */
}

.product-item img {
    /* Ensure images fit within their containers */
    width: 100%;
    height: auto;
    /* Maintain aspect ratio */
    object-fit: cover;
}

.btn-item {
    /* Ensure consistent height for button container */
    height: 30px; /* Adjust height as needed */
    /* Center align buttons vertically */
    display: flex;
    justify-content: center;
    align-items: center;
    
}

.add-cart,
.buy {
    /* Style your buttons consistently */
    color: #fff;
    border: none;
    padding: 6px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
    border-radius: 15px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.buy{
padding:8px 20px;
}
.add-cart{
color:black;
border:1px solid black;
}
.add-cart:hover,
.buy:hover {
    background-color: #005959;
    color:white;
}
</style>
   
    <?php include 'sidenav.php'; ?>
    <section class="container">
        <div class="main-content">
            <div class="row">
                <div class="sort">
                  
                </div>
               
            </div>
            <div class="product-list" id="product-list">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-item" data-name="<?php echo htmlspecialchars($product['prodID']); ?>" data-prod-id="<?php echo $product['prodID']; ?>" data-prod-price="<?php echo $product['prod_price']; ?>">
                            
                            <img src="../assets/img/<?php echo ($product['img']); ?>" alt="<?php echo htmlspecialchars($product['prod_name']); ?>">
                            <h5><?php echo htmlspecialchars($product['category']); ?></h5>
                            <p><?php echo htmlspecialchars($product['prod_name']); ?></p>
                            <div class="price">₱<?php echo number_format($product['prod_price'], 2); ?></div>
                            <div class="btn-item">
                            <form method="post">
                                <input type="hidden" name="prodID" value="<?php echo $product['prodID']; ?>">
                                <input type="hidden" name="prodName" value="<?php echo htmlspecialchars($product['prod_name']); ?>">
                                <input type="hidden" name="prodPrice" value="<?php echo $product['prod_price']; ?>">
                                <button type="submit" name="add_to_cart">Add to Cart</button>
                            </form>
                                <button class="buy">BUY NOW</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found.</p>
                <?php endif; ?>
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
                logo.src = 'logo_dark.png';
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

        
    </script>
</body>
</html>