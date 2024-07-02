
<?php
$servername = "localhost"; // your server name
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "th_db"; // your database name

                        // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_GET['id'];
    $newStatus = "delivered";   
    $sql = "UPDATE orders_prod SET status='$newStatus' WHERE orderID = $orderID";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Order status updated successfully!";
            $sql = "SELECT * FROM orders_prod where orderID = $orderID";
    $result = $conn->query($sql);
    $results = $conn->query($sql);
    $rowz = $results->fetch_assoc();
    $uid = $rowz['customerID'];
    $sql2 = "SELECT * FROM customerinfo where customerID = $uid";
    $resultz = $conn->query($sql2);
    $rows2 = $resultz->fetch_assoc();
    //data are uid, title, category, description, image, status
    $title = "Order ID#$order_id Status Update";
    $category = "Order status";
    $description = 
"Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!";
    $image = "thankyou.png";
    $status = "unread";
    $sql3 = "INSERT INTO msg_users (customerID, title, category, description, image, status) VALUES ('$uid', '$title', '$category', '$description', '$image', '$status')";
    $result3 = $conn->query($sql3);
            echo '<script type="text/javascript">
        window.close();
    </script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
    //send message to the user to notify about the status of their order
    
    

    
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title><?php echo "Admin | Tech Haven"; ?></title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <style>
        .body{
        margin:0;
        padding:0;
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
            border:none;
            cursor:pointer;
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
        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        .table thead {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table tbody td {
            color: #555;
        }
        .wrapper-dashboard{
        margin:0;
        }
        .card-body{
        border:1px solid #d9d9d9;
        width:auto;
        padding:10px;
        margin: 0 auto;
        display: block;
        line-height:1.5;
        
        }
        .card-body p{
        font-size:0.9rem;
        color:black;
        }
        /* Base styles for all screens */
        .col-sm-6 {
            box-sizing: border-box;
        }

        /* For small screens and up (min-width: 576px) */
        @media (min-width: 576px) {
            .col-sm-6 {
                width: 50%;
                float: left;
            }
        }

        /* Clear floats after the columns */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }
        .flex-container {
            display: flex;
            align-items: center; /* Align items vertically in the center */
            justify-content: space-between; /* Distribute items with maximum space between them */
            border-bottom:1px solid #d9d9d9;
            padding-bottom:10px;
        }

        .flex-container h4 {
            margin: 0; /* Remove any default margin */
        }

        .flex-container form {
            margin: 0; /* Remove any default margin */
        }

        .flex-container button {
            margin-left: 20px; /* Adjust the distance between Order # and button */
        }
        .badge {
            padding: 2px;
            border-radius: 0.25em;
            font-size: 1rem;
            color: black; /* Default text color */
        }

        .bg-warning {
            background-color: #E76F51; /* Existing styles */
            color: gray;
        }

        .custom-warning {
            background-color: #E76F51; /* Existing styles */
            color: white;
        }

        .custom1-warning {
            background-color: #288a72; /* Existing styles */
            color: white;
        }

        .bg-success {
            background-color: #4a9e2e; /* Existing styles */
            color: white;
        }

        .bg-secondary {
            background-color: gray; /* Existing styles */
            color: white;
        }

        .bg-placed {
            background-color: gray; /* New style for "placed" status */
            color: white; /* Optional: change text color to white for better contrast */
        }
    </style>
</head>
<body>
    
    <div class="dashboard-content">

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
                            $orderID = $_GET['id'];
                            $sql = "SELECT * FROM orders_prod where orderID = $orderID";
                            $results = $conn->query($sql);
                            $result = $conn->query($sql);
                            $rowz = $results->fetch_assoc();
                            $orderStatus = $rowz['status'];
                            function getBadgeClass($status) {
                                switch ($status) {
                                    case "placed":
                                        return "badge bg-placed";
                                    case "processing":
                                        return "badge custom-warning";
                                    case "delivery":
                                        return "badge custom1-warning";
                                    case "delivered":
                                        return "badge bg-success";
                                    default:
                                        return "badge bg-secondary"; // Default to secondary if status is not recognized
                                }
                            }
                                // Generate HTML based on the order status
                                $badgeClass = getBadgeClass($orderStatus);
                                $html = "<p  >Order Status: <span class=\"$badgeClass\" style= 'font-size:1rem;'>" . ucfirst($orderStatus) . "</span></p>";
                                function shouldDisplayDeliveryDetails($status) {
                                    return $status === "delivered";
                                }
                            $customerID = $rowz['customerID'];
                            $sql = "SELECT * FROM customerinfo where customerID = customerID";
                            $results = $conn->query($sql);
                            $rows = $results->fetch_assoc();
                            $sql5 = "SELECT date_delivered FROM complete_orders WHERE orderID = '$orderID'";
                            $result5 = $conn->query($sql5);

                            $date_delivered = "";
                            if ($result5->num_rows > 0) {
                                $row5 = $result5->fetch_assoc();
                                $date_delivered = $row5['date_delivered'];
                            }
        ?>
        <div class="wrapper-dashboard">
            <div class="flex-parent">
                <h3>Order Details</h3>
            </div><br>
            <div class="card-body">
<div class="flex-container">
        <h3>Order #<?php echo $rowz['orderID']?></h3>
        
    </div><br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>Order Details</h4>
                                                <div style="padding:10px 0 0 30px">
                                                    <?php
                                                    $order_date = $rowz['order_date'];
                                                    $dateTime = new DateTime($order_date);
                                                    $orderDate = $dateTime->format('F j, Y');
                                                    $orderTime = $dateTime->format('g:i A');
                                                    ?>

                                                    <p>Order Date: <?php echo $orderDate; ?></p>
                                                    <p>Order Time: <?php echo $orderTime; ?></p>
                                                    <?php echo $html?>
                                                    <p>Order Delivered: <?php echo !empty($date_delivered) ? (new DateTime($date_delivered))->format('F j, Y g:i A') : 'Not Yet Delivered'; ?></p>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5>Delivery Details</h5>
                                                <div style="padding:10px 0 0 30px">
                                                    <p>Name: <?php echo $rows['name']?></p> 
                                                    <p>Address: <?php 
                                                        $shipID = $rowz['shipID'];
                                                     $sql2 = "SELECT * FROM shipping where shipID = $shipID";
                                                    $resultz = $conn->query($sql2);
                                                    $rows2 = $resultz->fetch_assoc();     
                                                    echo $rows2['address'];
                                                     ?></p>

                                                    <p>Contact Number: <?php 
                                                        $customerID = $rowz['customerID'];
                                                     $sql2 = "SELECT * FROM customerinfo where customerID = $customerID";
                                                    $resultz = $conn->query($sql2);
                                                    $rows2 = $resultz->fetch_assoc();     
                                                    echo $rows2['contactNum'];
                                                     ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12" style="margin-top:30px;">
                                                <h4>Order Items</h4>
                                                <table class="table" style="text-align:center; font-size:0.9rem;">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $totalOrderPrice = 0;
                                    if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Check if the 'items' column is not null
                                        if ($row['items'] !== null) {
                                            $items_data = json_decode($row['items'], true);
                                
                                            // Check if json_decode was successful
                                                foreach ($items_data as $item) {
                                                    $name = $item['name'];
                                                    $price = $item['price'];
                                                    $qty = $item['qty'];
                                                    $formattedPrice = number_format($price, 2);
                                                    $totalPrice = $item['totalPrice'];
                                                    $formattedTotalPrice = number_format($totalPrice, 2);
                                                    $totalOrderPrice += $totalPrice;
                                                    $formattedTotalOrderPrice= number_format($totalOrderPrice, 2);
                                                   echo' <tr>
                                                        <td>' . $name . '</td>
                                                        <td>₱ ' . $formattedPrice. '</td>
                                                        <td>' . $qty . '</td>
                                                        <td>₱ ' . $formattedTotalPrice . '</td>
                                                    </tr>';
                                                    
                                                    
                                                }
                                               
                                        } else {
                                            // Handle case where 'items' column is null
                                            echo "'items' column is null";
                                        }
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                                   $deliveryFee = 50;
                                                    $formattedDeliveryFee = number_format($deliveryFee, 2);
                                                    $totalAmount = $totalOrderPrice + $deliveryFee;
                                                    $formattedtotalAmount = number_format($totalAmount, 2);
                                                    
                                            ?>

                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12" style="margin-top:20px;">
                                                <h4>Order Summary</h4>
                                                <table class="table" style="text-align:left; margin-top:10px; font-size:0.9rem;">
                                                    <tbody>
                                                        <tr class="subtotal" style="font-weight:500;">
                                                            <td>Mode of Payment</td>
                                                            <td>Cash on Delivery</td>
                                                        </tr>
                                                        <tr class="subtotal" style="font-weight:500;">
                                                            <td>Subtotal</td>
                                                            <td>₱ <?php echo $formattedTotalOrderPrice?></td>
                                                        </tr>
                                                        <tr class="lasttotal" style="font-weight:500;">
                                                            <td>Delivery Fee</td>
                                                            <td>₱
                                                                <?php echo $formattedDeliveryFee?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td style="font-weight:bold;">Total</td>
                                                            <td style="font-weight:bold;">₱
                                                                <?php echo $formattedtotalAmount?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

        </div>
        
                
    

    </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
