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
    // Escape user inputs for security
    $category = $conn->real_escape_string($_POST['category']);
    $prod_name = $conn->real_escape_string($_POST['prod_name']);
    $prod_desc = $conn->real_escape_string($_POST['prod_desc']);
    $prod_price = $conn->real_escape_string($_POST['prod_price']);
     $brand = strtoupper($conn->real_escape_string($_POST['brand']));
    
    // Image upload handling
    $targetDir = "../assets/img/";
    $fileName = basename($_FILES["img"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    
    if (!empty($fileName)) {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            // Allow certain file formats
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)) {
                    // Insert new product into products table
                    $insertProductQuery = "INSERT INTO products (category, prod_name, prod_desc, prod_price, brand, img) 
                                           VALUES ('$category', '$prod_name', '$prod_desc', '$prod_price', '$brand', '$fileName')";
                    if ($conn->query($insertProductQuery) === TRUE) {
                        $last_id = $conn->insert_id;
                        // Insert into prod_inventory with default quantity
                        $insertInventoryQuery = "INSERT INTO prod_inventory (prodID, prod_name, price, qty, updated_by) 
                                                VALUES ('$last_id', '$prod_name', '$prod_price', 0, '{$_SESSION['name']}')";
                        if ($conn->query($insertInventoryQuery) === TRUE) {
                            echo "New product added successfully.";
                        } else {
                            echo "Error: " . $insertInventoryQuery . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Error: " . $insertProductQuery . "<br>" . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "Please select an image file.";
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
    <title>Add New Product</title>
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

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
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
    <h2>Add New Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <!-- Populate options dynamically from database table "category" -->
            <?php
            // Database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch categories from database
            $categoryQuery = "SELECT name FROM category";
            $categoryResult = $conn->query($categoryQuery);

            if ($categoryResult->num_rows > 0) {
                while ($row = $categoryResult->fetch_assoc()) {
                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
            } else {
                echo '<option value="">No categories found</option>';
            }

            // Close database connection
            $conn->close();
            ?>
        </select><br><br>

        <label for="prod_name">Product Name:</label>
        <input type="text" id="prod_name" name="prod_name" required><br><br>

        <label for="prod_desc">Description:</label><br>
        <textarea id="prod_desc" name="prod_desc" rows="4" cols="50" required></textarea><br><br>

        <label for="prod_price">Price:</label>
        <input type="number" id="prod_price" name="prod_price" step=".01" required><br><br>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required><br><br>

        <label for="img">Image:</label>
        <input type="file" id="img" name="img" accept="image/*" required><br><br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
