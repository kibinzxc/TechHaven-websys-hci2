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
        }
        #example {
            width: 100% !important; 
            margin: auto;
        }
        #example th, #example td {
            text-align: center; 
        }
        .heading{
            display:inline-block;}
        .button-link {
            width: 125px;
            height: 35px;
            flex-shrink: 0;
            display: inline-block;
            font-size: 13px;
            border: 1px solid #000;
            background: #FFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            text-align: center;
            text-decoration: none; /* Space between buttons */
            color:black;
            padding:10px;
            margin-left:10px;
        
        }

        .button-link:hover {
            background-color: #91DDCF; /* Button background color on hover */
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
                     <a href="products.php" class="sidebar-link tooltip-trigger active" data-tooltip="Products">
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
        <h1>Products</h1>
            <div class="heading-buttons">
                <a href="#" class="button-link">Add Product</a>
                <a href="#" class="button-link">Add Category</a>
            </div>
        </div><br>
        
        <div class = "wrapper-dashboard">
        <h3>Categories</h3><br>
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
                    echo "<tr><td colspan='7'>No results found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
       <?php include 'delete_modal.php'; ?>
            <script src="delete_script.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        </div><br><br>
        <div class = "wrapper-dashboard">
        <h3>All</h3><br>
       <table id="example2" class="display" style="width:100%">
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

                $sql = "SELECT prodID, category, prod_name, prod_desc,prod_price, brand,img,date_created,date_updated FROM products";
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
                    echo "<tr><td colspan='7'>No results found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
       <?php include 'delete_modal.php'; ?>
            <script src="delete_script.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                    $('#example2').DataTable();
                });
            </script>
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
        });
    </script>
</body>
</html>