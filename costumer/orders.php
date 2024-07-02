<?php
session_start();
include 'dbcon.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Fetch orders for the logged-in user
$customerID = $_SESSION['customerID']; // Assuming customerID is stored in session upon login
$query = "SELECT * FROM orders_prod WHERE customerID = '$customerID' ORDER BY order_date DESC";
$result = $conn->query($query);

// Initialize an array to store fetched orders
$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Decode JSON items
        $items = json_decode($row['items'], true);
        
        // Initialize an array to store items of the current order
        $orderItems = [];
        
        if (!empty($items)) {
            foreach ($items as $item) {
                $productName = $item['name'];
                $qty = $item['qty'];
                $price = $item['price'];
                
                // Fetch product details for each product name
                $productQuery = "SELECT * FROM products WHERE prod_name = '$productName'";
                $productResult = $conn->query($productQuery);
                
                if ($productResult->num_rows > 0) {
                    $product = $productResult->fetch_assoc();
                    $orderItems[] = [
                        'productName' => $product['prod_name'],
                        'category' => $product['category'],
                        'img' => $product['img'],
                        'qty' => $qty,
                        'price' => $price
                    ];
                }
            }
        }
        
        // Add items to the current order
        $row['orderItems'] = $orderItems;

        // Format the date
        $orderDate = new DateTime($row['order_date']);
        $row['formatted_date'] = $orderDate->format('F j, Y g:i A');
        
        $orders[] = $row;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>Orderlist</title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    .mainbox {
        height: 80vh;
        width: 90vw;
        margin: auto;
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        padding-left: 120px;
        justify-content: center;
    }
    .tab {
        height: 15%;
        width: 80%;
        margin-left: 50px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: auto;
        align-items: center;
        padding-left: 15px;
        padding-right: 15px;
    }
    .all {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 17%;
        transition: background-color 0.3s, color 0.3s;
        cursor: pointer; 
    }
    .all.active {
        border-bottom: 3px solid #046f6f;
    }
    .list {
        height: 85%;
        width: 50%;
   margin: auto; /* Centers horizontally */
        display: flex;
        flex-direction: column;
        border-top: none;
        padding: auto;
        align-items: center;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 30px;
    }
    .product {
        width: 90%;
        border: solid 1px black;
        margin-bottom: 10px;
        border-radius: 5px;
        font-size: 12px;
    }
    .product.active {
        display: block; /* Show active product */
    }
    .upper, .middle, .bottom {
        padding: 10px;
    }
    .upper {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid black;
    }
    .id, .date, .status {
        flex: 1;
    }
    .status {
        color: #046f6f;
        font-weight: bold;
        text-align: right;
    }
    .middle {
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid black;
    }
    .item {
        display: flex;
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
    }
    .item:last-child {
        border-bottom: none;
    }
    .image {
        flex: 1;
        max-width: 100px;
    }
    .image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; /* Ensures the image maintains its aspect ratio */
    }
    .order-info {
        flex: 3;
        padding-left: 15px;
    }
    .info-item {
        margin-bottom: 5px;
    }
    .bottom {
        display: flex;
        justify-content: flex-end;
        color: #046f6f;
    }
</style>
</head>
<body>
    <?php include 'sidenav.php'; ?>
    
        <div class="list">
            <?php foreach ($orders as $order) : ?>
                <div class="product" data-tab-content="all">
                    <div class="upper">
                        <div class="id">ORDER <?php echo htmlspecialchars($order['orderID']); ?></div>
                        <div class="date"><?php echo htmlspecialchars($order['formatted_date']); ?></div>
                        <div class="status"><?php echo htmlspecialchars($order['status']); ?></div>
                    </div>

                    <div class="middle">
                        <?php foreach ($order['orderItems'] as $item) : ?>
                            <div class="item">
                                <div class="image">
                                    <img src="../assets/img/<?php echo htmlspecialchars($item['img']); ?>" alt="Product Image">
                                </div>
                                <div class="order-info">
                                    <div class="info-item"><h2><?php echo htmlspecialchars($item['productName']); ?></h2></div>
                                    <div class="info-item">Category: <?php echo htmlspecialchars($item['category']); ?></div>
                                    <div class="info-item">Quantity: <?php echo htmlspecialchars($item['qty']); ?></div>
                                    <div class="info-item">Price: <?php echo 'P' . htmlspecialchars($item['price']); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="bottom">
                        <h3>Total: <?php echo 'P' . htmlspecialchars($order['total_amount']); ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div><br>
    </div>

    <script>
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

        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab .all');
            const contents = document.querySelectorAll('.list .product');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const target = this.getAttribute('data-tab');

                    // Remove active class from all tabs and hide all contents
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.classList.remove('active'));

                    // Add active class to the clicked tab and show the corresponding content
                    this.classList.add('active');
                    document.querySelector(`.product[data-tab-content="${target}"]`).classList.add('active');
                });
            });

            // Set the first tab as active by default
            tabs[0].classList.add('active');
            contents[0].classList.add('active');
        });
    </script>
</body>
</html>