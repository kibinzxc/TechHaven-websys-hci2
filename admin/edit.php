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

// Initialize variables
$category = $prod_name = $prod_desc = $prod_price = $brand = $img = "";
$id = $_GET['id']; // Get product ID from URL parameter

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details for the given ID
$selectProductQuery = "SELECT category, prod_name, prod_desc, prod_price, brand, img FROM products WHERE prodID = $id";
$result = $conn->query($selectProductQuery);

if ($result->num_rows > 0) {
    // Fetch product details
    $row = $result->fetch_assoc();
    $category = $row['category'];
    $prod_name = $row['prod_name'];
    $prod_desc = $row['prod_desc'];
    $prod_price = $row['prod_price'];
    $brand = $row['brand'];
    $img = $row['img'];
} else {
    echo "Product not found.";
}

// Process form submission for updating product
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
                    // Update product details in products table
                    $updateProductQuery = "UPDATE products SET category = '$category', prod_name = '$prod_name', prod_desc = '$prod_desc', prod_price = '$prod_price', brand = '$brand', img = '$fileName' WHERE prodID = $id";
                    if ($conn->query($updateProductQuery) === TRUE) {
                        echo "Product updated successfully.";
                    } else {
                        echo "Error: " . $updateProductQuery . "<br>" . $conn->error;
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
        // Update product details without changing the image
        $updateProductQuery = "UPDATE products SET category = '$category', prod_name = '$prod_name', prod_desc = '$prod_desc', prod_price = '$prod_price', brand = '$brand' WHERE prodID = $id";
        if ($conn->query($updateProductQuery) === TRUE) {
            echo "Product updated successfully.";
            echo "<script>window.close();</script>";
        } else {
            echo "Error: " . $updateProductQuery . "<br>" . $conn->error;
        }
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
    <title>Edit Product</title>
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
    <h2>Edit Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post" enctype="multipart/form-data">
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
                    $selected = ($row['name'] == $category) ? 'selected' : '';
                    echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                }
            } else {
                echo '<option value="">No categories found</option>';
            }

            // Close database connection
            $conn->close();
            ?>
        </select><br><br>

        <label for="prod_name">Product Name:</label>
        <input type="text" id="prod_name" name="prod_name" value="<?php echo $prod_name; ?>" required><br><br>

        <label for="prod_desc">Description:</label><br>
        <textarea id="prod_desc" name="prod_desc" rows="4" cols="50" required><?php echo $prod_desc; ?></textarea><br><br>

        <label for="prod_price">Price:</label>
        <input type="number" id="prod_price" name="prod_price" step=".01" value="<?php echo $prod_price; ?>" required><br><br>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" value="<?php echo $brand; ?>" required><br><br>

        <label for="img">Current Image:</label><br>
        <img src="../assets/img/<?php echo $img; ?>" alt="Product Image" style="width: 150px; height: 100px;"><br><br>
        <label for="new_img">New Image (optional):</label>
        <input type="file" id="new_img" name="img" accept="image/*"><br><br>

        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>