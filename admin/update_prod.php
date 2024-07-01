<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "th_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update quantities in database
    $updatedByName = $_SESSION['name']; // Get logged-in user's name

    foreach ($_POST['quantity'] as $prodID => $addQuantity) {
        // Fetch current quantity from database
        $fetchQuery = "SELECT qty FROM prod_inventory WHERE prodID = '$prodID'";
        $fetchResult = mysqli_query($conn, $fetchQuery);
        if ($fetchResult && mysqli_num_rows($fetchResult) > 0) {
            $currentQuantity = mysqli_fetch_assoc($fetchResult)['qty'];
            $newQuantity = $currentQuantity + $addQuantity;

            // Update quantity in database
            $updateQuery = "UPDATE prod_inventory SET qty = '$newQuantity', updated_by = '$updatedByName' WHERE prodID = '$prodID'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Quantity updated successfully for Product ID: $prodID<br>";
            } else {
                echo "Error updating quantity for Product ID: $prodID - " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "Error fetching current quantity for Product ID: $prodID - " . mysqli_error($conn) . "<br>";
        }
    }

    // Close the window after updating
    echo '<script>window.close();</script>';
}

// Fetch product data from database
$query = "SELECT * FROM prod_inventory";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title>Admin | Tech Haven</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <style>
        /* Styling for the table */
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

        /* Add bottom border to table rows */
        .table tbody tr {
            border-bottom: 1px solid #ddd;
        }
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
            padding:10px 15px;
            font-weight:bold;
            border-radius:2px;
            background-color: #008686;
            border:none;
            cursor:pointer;
            float:right;
        }
        
        .button-link .bi {
            margin-right: 5px; /* Adjust the space between icon and text */
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
        <div class="wrapper-dashboard">
            <div class="flex-parent">
                <h3>Edit Product Quantities</h3>
            </div><br>
            <div class="card-body">
                <div class="row">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <table class="table">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Current Quantity</th>
                                <th>Add Quantity</th>
                            </tr>

                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['prodID']; ?></td>
                                    <td><?php echo $row['prod_name']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><input type="number" name="quantity[<?php echo $row['prodID']; ?>]" value="0"></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <button type="submit" class="button-link">
                            <i class="bi bi-check-square"></i> Update Products
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>