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
            transition: transform 0.2s ease-in-out, color 0.2s ease-in-out; /* Add transition for smooth effect */
             cursor:pointer;

        }
        
        .button-link2 .bi {
            transition: opacity 0.2s ease-in-out, color 0.2s ease-in-out; /* Add transition for smooth effect */
            
        }


        .button-link2:hover .bi {
            color: #007575; /* Change icon color on hover */
            opacity: 0.7; /* Reduce icon opacity on hover */
           
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
            <h1>Orders</h1>
            <div class="heading-buttons">
                <a href="#" class="button-link"><i class="bi bi-cart-plus-fill"></i> Add Order</a>
                <a href="#" class="button-link"><i class="bi bi-list-check"></i> View All Orders</a>
            </div>
        </div><br>
        <div class="card-container">
            <div class="card">
                <h2>Pending Orders</h2>
                <p>117</p>
            </div>
            <div class="card">
                <h2>To be Delivered</h2>
                <p>20</p>
            </div>
            <div class="card">
                <h2>Cancelled</h2>
                <p>22</p>
            </div>
            <div class="card">
                <h2>Completed</h2>
                <p>174</p>
            </div>
        </div>

        <div class="wrapper-dashboard" style="margin-bottom:20px;">
            <div class="flex-parent">
                <h3>Recent Orders</h3>
                <button id="toggleRecent" class="button-link2" style="float:right;">Hide Table <i class="bi bi-caret-up-fill"></i></button>
            </div><br>
            <div id="recentTable" style="display: block;">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Date Created</th>
                            <th>Added By</th>
                            <th>Actions</th>
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

                        $sql = "SELECT categoryID, name, date_created, added_by FROM category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row["categoryID"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["date_created"] . "</td>";
                                echo "<td>" . $row["added_by"] . "</td>";
                                echo "<td>";
                                echo "<a href='edit.php?id=" . $row["categoryID"] . "' class='bi bi-pencil-square' title='Edit' style='color:#008686;font-size:18px;'></a>";
                                echo "<a href='#' class='bi bi-trash-fill delete-btn' data-id='" . $row["categoryID"] . "' title='Delete' style='margin-left: 10px;color:maroon;font-size:18px;'></a>";
                                echo "</td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='6'>No results found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
                <div class="wrapper-dashboard" style="margin-bottom:20px;">
            <div class="flex-parent">
                <h3>Pending Orders</h3>
                <button id="togglePending" class="button-link2">Hide Table <i class="bi bi-caret-up-fill"></i></button>
            </div><br>
            <div id="pendingTable" style="display: block;">
                <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Date Created</th>
                            <th>Added By</th>
                            <th>Actions</th>
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

                        $sql = "SELECT categoryID, name, date_created, added_by FROM category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row["categoryID"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["date_created"] . "</td>";
                                echo "<td>" . $row["added_by"] . "</td>";
                                echo "<td>";
                                echo "<a href='edit.php?id=" . $row["categoryID"] . "' class='bi bi-pencil-square' title='Edit' style='color:#008686;font-size:18px;'></a>";
                                echo "<a href='#' class='bi bi-trash-fill delete-btn' data-id='" . $row["categoryID"] . "' title='Delete' style='margin-left: 10px;color:maroon;font-size:18px;'></a>";
                                echo "</td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='6'>No results found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
                <div class="wrapper-dashboard" style="margin-bottom:20px;">
            <div class="flex-parent">
                <h3>To be Delivered</h3>
                <button id="toggleTbd" class="button-link2">Hide Table <i class="bi bi-caret-up-fill"></i></button>
            </div><br>
            <div id="tbdTable" style="display: block;">
                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Date Created</th>
                            <th>Added By</th>
                            <th>Actions</th>
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

                        $sql = "SELECT categoryID, name, date_created, added_by FROM category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row["categoryID"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["date_created"] . "</td>";
                                echo "<td>" . $row["added_by"] . "</td>";
                                echo "<td>";
                                echo "<a href='edit.php?id=" . $row["categoryID"] . "' class='bi bi-pencil-square' title='Edit' style='color:#008686;font-size:18px;'></a>";
                                echo "<a href='#' class='bi bi-trash-fill delete-btn' data-id='" . $row["categoryID"] . "' title='Delete' style='margin-left: 10px;color:maroon;font-size:18px;'></a>";
                                echo "</td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='6'>No results found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="wrapper-dashboard">
            <div class="flex-parent">
                <h3>Completed</h3>
                <button id="toggleComplete" class="button-link2">Hide Table <i class="bi bi-caret-up-fill"></i></button>
            </div><br>
            <div id="completeTable" style="display: block;">
                <table id="example4" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Actions</th>
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

                        $sql = "SELECT prodID, category, prod_name, prod_desc, prod_price, brand, img, date_created, date_updated FROM products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter . "</td>";
                                echo "<td>" . $row["prodID"] . "</td>";
                                echo "<td>" . $row["category"] . "</td>";
                                echo "<td>" . $row["prod_name"] . "</td>";
                                echo "<td>" . $row["prod_desc"] . "</td>";
                                echo "<td>₱" . number_format($row["prod_price"], 2) . "</td>";
                                echo "<td>" . $row["brand"] . "</td>";
                                echo "<td><img src='../assets/img/" . $row["img"] . "' alt='" . $row["prod_name"] . "' style='width: 150px; height: 100px;'></td>";
                                echo "<td>";
                                echo "<a href='edit.php?id=" . $row["prodID"] . "' class='bi bi-pencil-square' title='Edit' style='color:#008686;font-size:18px;'></a>";
                                echo "<a href='#' class='bi bi-trash-fill delete-btn' data-id='" . $row["prodID"] . "' title='Delete' style='margin-left: 10px;color:maroon;font-size:18px;'></a>";
                                echo "</td>";
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
            $('#example2').DataTable();
            $('#example3').DataTable();
            $('#example4').DataTable();
        });
    </script>
</body>
</html>
