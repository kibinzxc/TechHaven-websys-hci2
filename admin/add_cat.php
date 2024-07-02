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

// Initialize variable for message display
$message = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and capitalize category name
    $category_name = ucfirst(strtolower($conn->real_escape_string($_POST['name']))); // Capitalize first letter of the string and make the rest lowercase
    $added_by = $_SESSION['name']; // Get logged-in user's name

    // Insert category into database
    $insertCategoryQuery = "INSERT INTO category (name, added_by) VALUES ('$category_name', '$added_by')";

    if ($conn->query($insertCategoryQuery) === TRUE) {
        $message = "New category added successfully.";
    } else {
        $message = "Error: " . $insertCategoryQuery . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Additional CSS styles based on provided design */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .dashboard-content {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007575;
            color: #fff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005959;
        }

        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>

<div class="dashboard-content">
    <h2>Add New Category</h2>
    <?php if (!empty($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
