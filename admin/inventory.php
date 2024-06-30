<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title><?php echo "Inventory | Admin"; ?></title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    
    <?php include 'logout.php'; ?>
    <style>
        /* Hide the default browser tooltip */
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
        #example, #example2 {
            width: 100% !important; 
            margin: auto;
        }
        #example th, #example td, #example2 th, #example2 td {
            text-align: center; 
        }
        .heading {
            display:inline-block;
        }
        .button-link {
            width: auto;
            height: 38px;
            flex-shrink: 0;
            display: inline-block;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            color:white;
            padding:10px;
            margin-left:10px;
            font-weight:bold;
            border-radius:5px;
            background-color: #008686;
        }

        .button-link:hover {
            background-color: #006666; /* Button background color on hover */
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
        
        .tableDish .table tbody tr td {
            padding: 10px;
        }

        .tableDish .table tbody tr:hover {
            background-color: #e9e9e9;
        }
        /* CSS for Stock Status */
        .in-stock {
            background-color: rgba(0, 151, 151, 0.15);
            color: #006D6D;
        }

        .low-stock {
            background-color: rgba(255, 156, 7, 0.15);
            color: #DB7600;
        }

        .out-of-stock {
            background-color: rgba(242, 0, 0, 0.15);
            color: #B70000;
        }

        /* Table Styling */
        #example th, #example td {
            text-align: center;
        }

        #example .in-stock {
            background-color: rgba(0, 151, 151, 0.15);
            color: #006D6D;
            font-weight:600;
        }

        #example .low-stock {
            background-color: rgba(255, 156, 7, 0.15);
            color: #DB7600;
            font-weight:600;
        }

        #example .out-of-stock {
            background-color: rgba(242, 0, 0, 0.15);
            color: #B70000;
            font-weight:600;
        }


    </style>
</head>
<body>
    <header class="nav">
        <div class="nav-left">
            <img src="../assets/img/tech-haven-logo2.png" alt="Tech Haven Logo" id="logo">
        </div>
        <div class="nav-right">
            <i class="bi bi-bell-fill tooltip-trigger" data-tooltip="Notifications"></i>
            <i class="bi bi-person-circle tooltip-trigger" data-tooltip="Profile"></i>
        </div>
    </header>
    <section class="container">
        <div class="sidebar">
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="dashboard.php" class="sidebar-link tooltip-trigger" data-tooltip="Dashboard">
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
                     <a href="inventory.php" class="sidebar-link tooltip-trigger  active" data-tooltip="Inventory">
                          <i class="bi bi-inboxes-fill"></i>
                    </a>    
                </li>
                <li class="sidebar-list-item">
                     <a href="feedbacks.php" class="sidebar-link tooltip-trigger" data-tooltip="Feedbacks">
                         <i class="bi bi-chat-square-dots-fill"></i>
                     </a>
                </li>   
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Advertisements">
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
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Notifications">
                         <i class="bi bi-bell-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Edit Profile">
                         <i class="bi bi-person-fill-gear"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="products.php?logout=1" class="sidebar-link tooltip-trigger" data-tooltip="Logout">
                         <i class="bi bi-box-arrow-right"></i>
                     </a>
                </li>
              </ul>
          </div>
    </aside>
    <div class="tooltip-text"></div>
     <div class="dashboard-content">
    <div class="heading-container">
        <h1>Products</h1>
            <div class="heading-buttons">
                <a href="#" class="button-link"><i class="bi bi-pencil-square"></i> Update</a>
            </div>
        </div><br>

        <div class="tables-container">
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
            <div class="table-wrapper">
                <div class = "wrappery">
                <h3><span style="color:#b30000;">Least</span> Selling Products</h3><br>
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
                            ORDER BY pi.sold ASC
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
    </div>
    <br><br>
    <div class = "wrapper-dashboard">
        <h3>Categories</h3><br>
       <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Sold(pcs)</th>
                    <th>Last Update</th>
                    <th>Updated By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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

                $sql = "SELECT invID, prod_name, prodID, price, qty, sold, last_update, updated_by
                        FROM prod_inventory";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $counter = 1;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $stock_status = '';

                        // Determine stock status based on qty
                        if ($row['qty'] > 0) {
                            if ($row['qty'] >= 20) {
                                $stock_status = 'IN STOCK';
                                $status_class = 'in-stock';
                            } else {
                                $stock_status = 'LOW STOCK';
                                $status_class = 'low-stock';
                            }
                        } else {
                            $stock_status = 'OUT OF STOCK';
                            $status_class = 'out-of-stock';
                        }

                        // Calculate the time difference with timezone adjustment
                        $date = new DateTime($row["last_update"], new DateTimeZone('Asia/Manila'));
                        $now = new DateTime(null, new DateTimeZone('Asia/Manila'));
                        $interval = $now->diff($date);

                        if ($interval->y > 0) {
                            $timeAgo = $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
                        } elseif ($interval->m > 0) {
                            $timeAgo = $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
                        } elseif ($interval->d > 0) {
                            $timeAgo = $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
                        } elseif ($interval->h > 0) {
                            $timeAgo = $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
                        } elseif ($interval->i > 0) {
                            $timeAgo = $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
                        } else {
                            $timeAgo = $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ago';
                        }

                        // Output each row with dynamic stock status class
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>" . htmlspecialchars($row["prod_name"]) . "</td>";
                        echo "<td>" . $row["prodID"] . "</td>";
                        echo "<td class='" . $status_class . "'>" . $stock_status . "</td>";
                        echo "<td>₱" . number_format($row["price"], 2) . "</td>";
                        echo "<td>" . $row["qty"] . "</td>";
                        echo "<td>" . $row["sold"] . "</td>";
                        echo "<td>" . $timeAgo . "</td>";
                        echo "<td>" . $row["updated_by"] . "</td>";
                        echo "<td><a href='edit.php?id=" . $row["invID"] . "' class='bi bi-pencil-square' title='Edit' style='color:#008686;font-size:18px;'></a></td>";
                        echo "</tr>";

                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='10'>No results found</td></tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
