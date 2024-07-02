<?php
include 'dbcon.php';
include 'auth_check.php';
checkAuth();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../portal/logo.jpg" type="image/x-icon">
    <title>Homepage TechHaven</title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<style>
.homepage-prod-list1{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(225px, 1fr));
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
<body>  
<?php include 'sidenav.php'; ?>
<section>
        <div class="homepage-content">
            <div class="content">
                <img src="homepagepic.png" alt="Homepage Picture">
            </div>
            <div class="right">
                <h1><span>Elevate</span> your experience, <br>Discover your <span>sanctuary</span></h1>
                <button class="btn-shop-now" id="products">Shop Now</button>
            </div>
        </div>
        
        <div class="main-content-homepage">
            <div class="title-prod">
                <h1>Featured</h1>
            </div>
            <div class="homepage-prod-list1" id="product-list">                   
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get products with sold count and image, ordered by sold count
$query = "SELECT p.prodID, p.prod_name, p.category, p.prod_price, i.qty, i.sold, p.img
          FROM products p
          INNER JOIN prod_inventory i ON p.prodID = i.prodID
          ORDER BY i.sold DESC
          LIMIT 5";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="product-item" data-name="<?php echo htmlspecialchars($row['prod_name']); ?>">

            <img src="../assets/img/<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['prod_name']); ?>">
            <h5><?php echo htmlspecialchars($row['category']); ?></h5>
            <p><?php echo htmlspecialchars($row['prod_name']); ?></p>
            <div class="price">₱<?php echo number_format($row['prod_price'], 2); ?></div>
            <div class="btn-item">
                <button class="add-cart">
                    <i class="bi bi-cart-plus-fill"></i> Add to cart
                </button>
                <button class="buy">BUY NOW</button>
            </div>
        </div>
        <?php
    }
} else {
    echo "No products found.";
}

// Close connection
$conn->close();
?>

                

            </div><br>
        </div>
    <section>



    </section>
    
    <script>
        const toggle = document.getElementById('dark-mode-toggle');
        const logo = document.getElementById('logo');
        const loginButton = document.getElementById('loginButton');


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
            logo.src = 'tech-haven-logo2.png';
        }
        setTimeout(() => {
            toggle.classList.remove('rotate');
        }, 400);
    });

    loginButton.addEventListener('click', () => {
        window.location.href = 'login.php';
    });

    
        // Redirect to login page when login button is clicked
        loginButton.addEventListener('click', () => {
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>
