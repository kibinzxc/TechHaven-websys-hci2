<?php
include 'auth_check.php';
checkAuth();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title><?php echo "Products | Admin"; ?></title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">


    <style>
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
            min-height: 100vh;
        }
        #example,#example2,#example3,#example4 {
            width: 100% !important; 
            margin: auto;
        }
        #example th,#example2 th,#example3 th,#example4 th, #example td,#example2 td,#example3 td,#example4 td{
            text-align: center; 
        }
        #example2 {
            width: 100% !important; 
            margin: auto;
        }

        .heading{
            display:inline-block;}
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
        .button-link {
            width: auto;
            height: auto;
            flex-shrink: 0;
            display: inline-block;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            color:#f2f2f2;
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

        .heading-container h1 {
            margin-right: 10px; /* Space between heading and button */
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

        .flex-parent h3 .button-link2 {
            margin-left: 15px; /* Adjust the distance between "New Orders" and buttons */
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
        .sidebar{
        height:auto;
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
                    <a href="dashboard.php" class="sidebar-link tooltip-trigger" data-tooltip="Dashboard">
                          <i class="bi bi-bar-chart-line-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="orders.php" class="sidebar-link tooltip-trigger active" data-tooltip="Orders">
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
        <div class="heading-container">
            <h1>Orders</h1>
            <div class="heading-buttons">
            <a href="pending.php" class="button-link" target="_blank">
                <i class="bi bi-gear-wide-connected"></i> Processing
            </a>
            <a href="delivery.php" class="button-link" target="_blank">
                <i class="bi bi-box-seam-fill"></i> Delivery
            </a>
            <a href="success_orders.php" class="button-link" target="_blank">
                <i class="bi bi-bag-check-fill"></i> Completed
            </a>
            <a href="all_orders.php" class="button-link" target="_blank">
                <i class="bi bi-list-check"></i> View All Orders
            </a>
            </div>
        </div><br>
        <div class="card-container">
        <div class="card">
            <?php   
                        // Database connection
                        $servername = "localhost"; // your server name
                        $username = "root"; // your database username
                        $password = ""; // your database password
                        $dbname = "th_db"; // your database name

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
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
                        $conn->close();
            ?>
            <a href="orders.php" target="_blank">
                <h2>New Orders</h2>
                <p><?php echo $countPlaced; ?></p>
            </a>
        </div>
        <div class="card">
            <a href="pending.php" target="_blank">
                <h2>Processing</h2>
                <p><?php echo $countProcessing; ?></p>
            </a>
        </div>
        <div class="card">
            <a href="delivery.php"  target="_blank">
                <h2>To be Delivered</h2>
                <p><?php echo $countDelivery ?></p>
            </a>
        </div>
        <div class="card">
            <a href="success_orders.php" target="_blank">
                <h2>Completed</h2>
                <p><?php echo $countDelivered; ?></p>
            </a>
        </div>
        </div>

        <div class="wrapper-dashboard" style="margin-bottom:20px;">
            <div class="flex-parent">
                <h3>New Orders</h3>
                <button id="toggleRecent" class="button-link2" style="float:right;">Hide Table <i class="bi bi-caret-up-fill"></i></button>
            </div><br>
            <div id="recentTable" style="display: block;">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>OrderID</th>
                            <th>Order Date & Time</th>
                            <th>Order Status</th>
                            <th>Action</th>
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

                        $sql = "SELECT orderID, order_date, status FROM orders_prod where status='placed'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row["orderID"] . "</td>";
                                echo "<td>";
                                $dateTime = new DateTime($row["order_date"]);
                                $formattedDate = $dateTime->format('F j, Y g:i A');
                                echo $formattedDate;
                                echo "</td>";
                                
                                // Check status and modify if it is pending
                                if ($row["status"] == "placed") {
                                    echo "<td style='color:#4D869C; font-weight:bold;'>New Order</td>";
                                } else {
                                    echo "<td>" . $row["status"] . "</td>";
                                }
                                
                                echo "<td>";
                                echo "<a href='#' onclick=\"openWindow('view_order.php?id=" . $row["orderID"] . "')\" title='View Order' style='background:#008686; color:white; border-radius:5px; padding:5px 10px;font-size:13px; text-decoration:none;'>
                                    <span style='font-size:13px;'>View Order</span>
                                    <i class='bi bi-arrow-right'></i>
                                </a>";
                                echo "</td>";  // Missing </td> for the link column
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='9'>No results found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
                
    

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

            // Toggle button and Pending Table
            var togglePending = document.getElementById('togglePending');
            var pendingTable = document.getElementById('pendingTable');
            var pendingToggleIcon = togglePending.querySelector('i');

            togglePending.addEventListener('click', function() {
                if (pendingTable.style.display === 'none') {
                    pendingTable.style.display = 'block';
                    pendingToggleIcon.classList.remove('bi-caret-down-fill');
                    pendingToggleIcon.classList.add('bi-caret-up-fill');
                    togglePending.innerHTML = 'Hide Table <i class="bi bi-caret-up-fill"></i>';
                } else {
                    pendingTable.style.display = 'none';
                    pendingToggleIcon.classList.remove('bi-caret-up-fill');
                    pendingToggleIcon.classList.add('bi-caret-down-fill');
                    togglePending.innerHTML = 'Show Table <i class="bi bi-caret-down-fill"></i>';
                }
            });

            // Toggle button and TBD Table
            var toggleTbd = document.getElementById('toggleTbd');
            var tbdTable = document.getElementById('tbdTable');
            var tbdToggleIcon = toggleTbd.querySelector('i');

            toggleTbd.addEventListener('click', function() {
                if (tbdTable.style.display === 'none') {
                    tbdTable.style.display = 'block';
                    tbdToggleIcon.classList.remove('bi-caret-down-fill');
                    tbdToggleIcon.classList.add('bi-caret-up-fill');
                    toggleTbd.innerHTML = 'Hide Table <i class="bi bi-caret-up-fill"></i>';
                } else {
                    tbdTable.style.display = 'none';
                    tbdToggleIcon.classList.remove('bi-caret-up-fill');
                    tbdToggleIcon.classList.add('bi-caret-down-fill');
                    toggleTbd.innerHTML = 'Show Table <i class="bi bi-caret-down-fill"></i>';
                }
            });

            // Toggle button and Complete Table
            var toggleComplete = document.getElementById('toggleComplete');
            var completeTable = document.getElementById('completeTable');
            var completeToggleIcon = toggleComplete.querySelector('i');

            toggleComplete.addEventListener('click', function() {
                if (completeTable.style.display === 'none') {
                    completeTable.style.display = 'block';
                    completeToggleIcon.classList.remove('bi-caret-down-fill');
                    completeToggleIcon.classList.add('bi-caret-up-fill');
                    toggleComplete.innerHTML = 'Hide Table <i class="bi bi-caret-up-fill"></i>';
                } else {
                    completeTable.style.display = 'none';
                    completeToggleIcon.classList.remove('bi-caret-up-fill');
                    completeToggleIcon.classList.add('bi-caret-down-fill');
                    toggleComplete.innerHTML = 'Show Table <i class="bi bi-caret-down-fill"></i>';
                }
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
    <script>
    function openWindow(url) {
        var width = 1000; // Width of the new window
        var height = 1000; // Height of the new window
        var left = (screen.width - width) / 2; // Center the window horizontally
        var top = (screen.height - height) / 2; // Center the window vertically

        window.open(url, '_blank', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
    }
    </script>
</body>
</html>
