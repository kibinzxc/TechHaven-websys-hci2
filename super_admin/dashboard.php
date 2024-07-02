<?php
include 'auth_check.php';
checkAuth();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Query to get sum of total_amount for today's complete orders
$sql = "SELECT SUM(total_amount) AS total_sales FROM complete_orders WHERE DATE(date_delivered) = CURDATE()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSales = $row['total_sales'];
} else {
    $totalSales = 0;
}

// Initialize an array to store sales data for each day
$weeklySales = array_fill(0, 7, 0); // Index 0 for Sunday, 1 for Monday, ..., 6 for Saturday

// Query to get sum of total_amount for each day of the current week
$currentDate = date('Y-m-d');
$startOfWeek = date('Y-m-d', strtotime('last Sunday', strtotime($currentDate)));
$endOfWeek = date('Y-m-d', strtotime('next Saturday', strtotime($currentDate)));

$sql3 = "SELECT DATE(date_delivered) AS delivery_date, SUM(total_amount) AS total_sales 
        FROM complete_orders 
        WHERE date_delivered BETWEEN '$startOfWeek' AND '$endOfWeek'
        GROUP BY delivery_date";

$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $deliveryDate = date('w', strtotime($row['delivery_date'])); // Get day of the week (0 for Sunday, 1 for Monday, ..., 6 for Saturday)
        $weeklySales[$deliveryDate] = $row['total_sales'];
    }
}
$sql4 = "SELECT COUNT(*) AS totalCustomers FROM customerinfo";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $countCustomers = $row4['totalCustomers'];
} else {
    $countCustomers = 0;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title><?php echo "Super Admin | Tech Haven"; ?></title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Hide the default browser tooltip */
        .wrappery{
        min-height:auto;
        height:350px;
        }
        .tooltip-text {
            position: absolute;
            display: none;
            background-color: #5C5C5C;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            font-size: 10px;
            white-space: nowrap;
            z-index: 999;
            font-family:'Inter';
        }

        .active-icon {
            color: green !important;
        }
         .dashboard-content {
        width: 100%; 
        padding: 20px;
    }
    #example {
        width: 100% !important; 
        margin: auto;
    }
    #example th, #example td {
        text-align: center; 
    }
        .card-container {
            display: flex;
            justify-content: space-between; /* Ensures equal space between cards */
            margin-bottom: 20px;
        }

        .card {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            text-align: left;
             width: calc(25% - 20px); /* Adjust width to fit 4 cards in a row */
            padding:20px;
            border-radius: 15px;
            background: #FFF;
            box-shadow: 0px 1px 4px 1px rgba(0, 0, 0, 0.25);
            height:120px;
            transition: transform 0.3s ease; 
           
                
        }
        .card:hover {
            transform: scale(1.05); /* Scale up the card slightly on hover */
        }

        .card h2 {
            margin: 0;
            font-size: 16px;
            color: #007575;
        
        }

        .card p {
            margin: 10px 0 0;
            font-size: 32px;
            color: #343434;
            font-weight:600;
            letter-spacing:1.6px;
        }
        .card a{
            text-decoration:none;
        }
 .heading-container {
            display: flex;
            align-items: center;
            justify-content: space-between; /* This will push the .button-link to the right */
        }

        .heading-container h3 {
            margin-right: 10px; /* Space between heading and button */
        }
        .flex-parent {
            display: flex;
            align-items: center; /* Align items vertically in the center */
            justify-content: start; /* Align items to the start of the container */
            gap: 20px; /* Adjust the gap between the <h3> and .heading-container as needed */
        }
        .product-item {
            background-color: #f0f0f0; /* Gray background color */
            padding: 15px; /* Padding around each product */
            margin-bottom: 10px; /* Space between products */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Box shadow for depth */
        }

        .product-item img {
            max-width: 100px; /* Adjust max width for product images */
            max-height: 100px; /* Adjust max height for product images */
            margin-right: 15px; /* Optional: Space between image and text */
            vertical-align: middle; /* Align image vertically */
        }

        .product-details {
            display: flex;
            align-items: center; /* Align items vertically in the center */
            color:#343434;
        }

        .product-details h4 {
            margin-bottom: 5px; /* Optional: Adjust space between title and details */
        }
        .flex-parent {
            display: flex;
            align-items: center; /* Align items vertically in the center */
            justify-content: space-between; /* Distribute items with maximum space between them */
        }

        .flex-parent h3 {
            margin: 0; /* Remove any default margin */
            transition: transform 0.2s ease-in-out; /* Add transition for smooth effect */
            display: flex;
            align-items: center;
        }
        .button-link2 {
            width: auto;
            height: auto;
            flex-shrink: 0;
            display: inline-block;
            border: 1px solid #000;
            background: #FFF;
            font-size:12px;
            text-align: center;
            text-decoration: none; /* Space between buttons */
            color:black;
            padding:5px;
            margin-left:10px;
            border:none;
            transition: transform 0.2s ease-in-out, color 0.2s ease-in-out;
             cursor:pointer;

        }
        
        .button-link2 .bi {
            transition: opacity 0.2s ease-in-out, color 0.2s ease-in-out; 
            
        }


        .button-link2:hover .bi {
            color: #007575;
            opacity: 0.7; 
           
        }
    </style>
</head>
<body>
    <header class="nav">
        <div class="nav-left">
            <img src="../assets/img/tech-haven-logo2.png" alt="Tech Haven Logo" id="logo">
        </div>
        <div class="nav-right">
        <p style="font-size: 0.8rem; font-style: normal; margin-top:5px;">
                Hello, <?php echo htmlspecialchars($_SESSION['name']); ?>
        </p> 
        </div>
    </header>
    <section class="container">
        <div class="sidebar">
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="dashboard.php" class="sidebar-link tooltip-trigger active" data-tooltip="Dashboard">
                          <i class="bi bi-bar-chart-line-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="orders.php" class="sidebar-link tooltip-trigger" data-tooltip="Orders">
                          <i class="bi bi-clipboard2-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="products.php" class="sidebar-link tooltip-trigger" data-tooltip="Products">
                          <i class="bi bi-box-seam-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="inventory.php" class="sidebar-link tooltip-trigger" data-tooltip="Inventory">
                          <i class="bi bi-inboxes-fill"></i>
                    </a>    
                </li>
                <li class="sidebar-list-item">
                     <a href="feedbacks.php" class="sidebar-link tooltip-trigger" data-tooltip="Feedbacks">
                         <i class="bi bi-chat-square-dots-fill"></i>
                     </a>
                </li>   
                <li class="sidebar-list-item">
                     <a href="advertisement.php" class="sidebar-link tooltip-trigger" data-tooltip="Messages">
                         <i class="bi bi-envelope-plus-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Users">
                         <i class="bi bi-people-fill"></i>
                     </a>
                </li>
                <hr>

                <li class="sidebar-list-item">
                     <a href="profile.php" class="sidebar-link tooltip-trigger" data-tooltip="Edit Profile">
                         <i class="bi bi-person-fill-gear"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="logout.php" class="sidebar-link tooltip-trigger" data-tooltip="Logout">
                         <i class="bi bi-box-arrow-right"></i>
                     </a>
                </li>
              </ul>
          </div>
    </aside>
    <div class="tooltip-text"></div>
    <div class="dashboard-content">
        <h1>Dashboard</h1>
        <p>Welcome to the Tech Haven Admin Dashboard</p><br>
            <div class="card-container">
        <div class="card">
            <?php   
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "th_db";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Function to get order count by status and date
                function getOrderCountByDate($conn, $status, $date) {
                    $sql = "SELECT COUNT(*) as count FROM orders_prod WHERE status = '$status' AND DATE(order_date) = '$date'";
                    $result = $conn->query($sql) or die("Error: " . $conn->error);
                    $row = $result->fetch_assoc();
                    return $row['count'];
                }
               
                        function getOrderCount($conn, $status) {
                            $sql = "SELECT COUNT(*) as count FROM orders_prod WHERE status = '$status'";
                            $result = $conn->query($sql) or die("Error: " . $conn->error);
                            $row = $result->fetch_assoc();
                            return $row['count'];
                        }
                        $countPlaced = getOrderCount($conn, 'placed');
                        $countProcessing = getOrderCount($conn, 'processing');
                        $countDelivery = getOrderCount($conn, 'delivery');
                        $countDelivered = getOrderCount($conn, 'delivered');
                        $countpending = $countPlaced + $countProcessing;
                // Function to get total order count for today
                function getTotalOrderCountToday($conn, $date) {
                    $countPlacedToday = getOrderCountByDate($conn, 'placed', $date);
                    $countProcessingToday = getOrderCountByDate($conn, 'processing', $date);
                    $countDeliveryToday = getOrderCountByDate($conn, 'delivery', $date);
                    $countDeliveredToday = getOrderCountByDate($conn, 'delivered', $date);

                    return [
                        'placed' => $countPlacedToday,
                        'processing' => $countProcessingToday,
                        'delivery' => $countDeliveryToday,
                        'delivered' => $countDeliveredToday,
                        'pending' => $countPlacedToday + $countProcessingToday,
                        'all' => $countPlacedToday + $countProcessingToday + $countDeliveryToday + $countDeliveredToday
                    ];
                }

                // Example: Count orders for today
                $today = date('Y-m-d');
                $countToday = getTotalOrderCountToday($conn, $today);
                
                $currentMonth = date('m');
                $currentYear = date('Y');

                // Query to get the total sales for the current month
                $sql6 = "SELECT SUM(total_amount) AS total_sales
                        FROM orders_prod
                        WHERE MONTH(order_date) = '$currentMonth' AND YEAR(order_date) = '$currentYear'";

                $result6 = $conn->query($sql6);

                $totalSalesMonthly = 0;
                if ($result6->num_rows > 0) {
                    $row6 = $result6->fetch_assoc();
                    $totalSalesMonthly = $row6['total_sales'];
                }

                $conn->close();
            ?>
            <a href="orders.php" target="_blank">
                <h2>Orders Today</h2>
                <p><?php echo $countToday['all']; ?></p>
            </a>
        </div>
        <div class="card">
                <h2>Today's Sales</h2>

    <p>₱ <?php echo number_format($totalSales, 2); ?></p>
        </div>
        <div class="card">
            <a href="orders.php"  target="_blank">
                <h2>Pending Orders</h2>
                <p><?php echo $countpending ?></p>
            </a>
        </div>
        <div class="card">
                <h2>Total Monthly Sales</h2>
         <p>₱<?php echo number_format($totalSalesMonthly, 2); ?></p>
        </div>
        </div>
        <br>
<div class="tables-container">
            <div class="table-wrapper">
            <div class = "wrappery">
            <canvas id="weeklySalesChart" width="400" height="200"></canvas>                
            </div>
            </div>
            <div class="table-wrapper">
                <div class = "wrappery">
                <h3><span style="color:#008686;">Most</span> Selling Products</h3><br>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "th_db";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT pi.prod_name, pi.price, pi.sold, p.img
                            FROM prod_inventory pi
                            JOIN products p ON pi.prodID = p.prodID
                            ORDER BY pi.sold DESC
                            LIMIT 5";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="product-item">
                                    <div class="product-details" style="display:inline-block; width:100%;">
                                        <img src="../assets/img/' . htmlspecialchars($row["img"]) . '" alt="' . htmlspecialchars($row["prod_name"]) . '" style="width:50px; height:50px;float:left;">
                                        <div style="float:left;">
                                            <h2 style="margin-bottom:5px;">' . htmlspecialchars($row["prod_name"]) . '</h2>
                                            <p>Sold: <span style="font-weight:bold;">' . htmlspecialchars($row["sold"]) . '</span> pcs</p>
                                        </div>
                                        <div style="float:right;">
                                        <p style="font-size:15px; font-weight:bold;">₱' . number_format($row["price"], 2). '</p>
                                        </div>
                                    </div>
                                  </div>';
                        }
                    } else {
                        echo '<div>No data available</div>';
                    }

                    // Close the connection
                    $conn->close();
                ?>
            </div>
        </div>
    </div><br><br>
<div class="wrapper-dashboard" style="margin-bottom:20px;">
    <div class="flex-parent">
        <h3>Recent Orders</h3>
        <button id="toggleRecent" class="button-link2" style="float:right;">Hide Table <i class="bi bi-caret-up-fill"></i></button>
    </div><br>
    <div id="recentTable" style="display: block;">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Order#</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Order Date & Time</th>
                    <th>Amount</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost"; // your server name
                $username = "root"; // your database username
                $password = ""; // your database password
                $dbname = "th_db"; // your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch recent orders from orders_prod table
                $sql = "SELECT orderID, customerID, items, order_date, status FROM orders_prod WHERE status = 'placed' OR status = 'processing' ORDER BY order_date DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $counter = 1;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $orderID = $row["orderID"];
                        $customerID = $row["customerID"];
                        $items = json_decode($row["items"], true);

                        foreach ($items as $item) {
                            // Fetch product details from products table using the product name
                            $product_sql = "SELECT prod_name, img FROM products WHERE prod_name = '" . $item['name'] . "'";
                            $product_result = $conn->query($product_sql);
                            $product_row = $product_result->fetch_assoc();

                            // Fetch customer name and address from customerinfo table using customerID
                            $customer_sql = "SELECT name, address FROM customerinfo WHERE customerID = '" . $customerID . "'";
                            $customer_result = $conn->query($customer_sql);
                            $customer_row = $customer_result->fetch_assoc();

                            // Display the order details
                            echo "<tr>";
                            echo "<td><img src='../assets/img/" . $product_row['img'] . "' alt='" . $item['name'] . "' style='width:50px; height:50px;'></td>";
                            echo "<td>" . $item['name'] . "</td>";
                            echo "<td>" . $orderID . "</td>";
                            echo "<td>" . $customer_row['name'] . "</td>";
                                // Check status and modify if it is pending
                                if ($row["status"] == "placed") {
                                    echo "<td style='color:#4D869C; font-weight:bold;'>New Order</td>";
                                }else if($row["status"] == "processing") {
                                    echo "<td style='color:#F4A261; font-weight:bold;'>Processing</td>";
                                }else if($row["status"] == "delivery") {
                                    echo "<td style='color:#288a72; font-weight:bold;'>To Be Delivered</td>";
                                }else if($row["status"] == "delivered") {
                                    echo "<td style='color:#4a9e2e; font-weight:bold;'>Complete</td>";
                                }  else {
                                    echo "<td>" . $row["status"] . "</td>";
                                }
                            echo "<td>" . date('F j, Y g:i A', strtotime($row["order_date"])) . "</td>";
                            echo "<td>₱ " . number_format($item['totalPrice'], 2) . "</td>";
                            echo "<td>" . $customer_row['address'] . "</td>";
                            echo "</tr>";
                        }
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='8'>No results found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggers = document.querySelectorAll('.tooltip-trigger');
            var tooltipText = document.querySelector('.tooltip-text');

            tooltipTriggers.forEach(function(trigger) {
                trigger.addEventListener('mouseover', function(event) {
                    var tooltipContent = this.getAttribute('data-tooltip');
                    tooltipText.textContent = tooltipContent;
                    tooltipText.style.display = 'block';
                    tooltipText.style.top = (event.clientY + window.scrollY + 10) + 'px';
                    tooltipText.style.left = (event.clientX + window.scrollX + 10) + 'px';
                });

                trigger.addEventListener('mouseout', function() {
                    tooltipText.style.display = 'none';
                });
            });
        });
    </script>
 <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get weekly sales data from PHP
            var weeklySales = <?php echo json_encode($weeklySales); ?>;
            
            // Days of the week labels (Sunday to Saturday)
            var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            // Chart.js code to create a bar graph
            var ctx = document.getElementById('weeklySalesChart').getContext('2d');
            var weeklySalesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: daysOfWeek,
                    datasets: [{
                        label: 'Daily Sales',
                        data: weeklySales,
                        backgroundColor: '#007575',
                        borderColor: '#007575',
                        borderRadius: 10 // Set border radius for all bars
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '₱' + value.toFixed(2);
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
    <script>
            var toggleRecent = document.getElementById('toggleRecent');
            var recentTable = document.getElementById('recentTable');
            var recentToggleIcon = toggleRecent.querySelector('i');

            toggleRecent.addEventListener('click', function() {
                if (recentTable.style.display === 'none') {
                    recentTable.style.display = 'block';
                    recentToggleIcon.classList.remove('bi-caret-down-fill');
                    recentToggleIcon.classList.add('bi-caret-up-fill');
                    toggleRecent.innerHTML = 'Hide Table <i class="bi bi-caret-up-fill"></i>';
                } else {
                    recentTable.style.display = 'none';
                    recentToggleIcon.classList.remove('bi-caret-up-fill');
                    recentToggleIcon.classList.add('bi-caret-down-fill');
                    toggleRecent.innerHTML = 'Show Table <i class="bi bi-caret-down-fill"></i>';
                }
            });
    </script>
</body>
</html>
