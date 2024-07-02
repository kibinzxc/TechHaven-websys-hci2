<?php
session_start();

// Database connection details
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "th_db";

// Initialize variables with empty values
$first_name = $last_name = $email = $contact_number = $address = $password = "";
$nameErr = $emailErr = $passwordErr = "";
$user_id = null; // Initialize user_id variable

// Check if user ID or email is provided in URL (assuming you pass it via GET or POST method)
if (isset($_GET['id'])) {
    $user_id = $_GET['id']; // Example: sanitize and validate user input if using in a real application

    // Create connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user data based on user ID
    $query = "SELECT * FROM customerInfo WHERE customerID = $user_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();

        // Split name into first name and last name
        $full_name = $user['name'];
        $name_parts = explode(' ', $full_name, 2);
        $first_name = $name_parts[0];
        $last_name = isset($name_parts[1]) ? $name_parts[1] : '';

        // Assign other fetched data to variables
        $email = $user['email'];
        $contact_number = $user['contactNum'];
        $address = $user['address'];

        // Close the connection
        $conn->close();
    } else {
        echo "User not found.";
        exit(); // Exit if user not found
    }
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["first_name"]) || empty($_POST["last_name"])) {
        $nameErr = "Both first name and last name are required";
    } else {
        $first_name = test_input($_POST["first_name"]);
        $last_name = test_input($_POST["last_name"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate contact number
    if (empty($_POST["contact_number"])) {
        $contact_number = "";
    } else {
        $contact_number = test_input($_POST["contact_number"]);
    }

    // Validate address
    if (empty($_POST["address"])) {
        $address = "";
    } else {
        $address = test_input($_POST["address"]);
        // Capitalize the address
        $address = ucwords(strtolower($address));
    }

    // Validate password (optional for edit user, only validate if changed)
    if (!empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
        // Password validation criteria
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long, and include at least one uppercase letter, one lowercase letter, one number, and one special character";
        } else {
            $hashed_password = md5($password); // Replace with stronger encryption method
        }
    }

    // If all validations are passed, proceed with database update
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        // Create connection
        $conn = new mysqli($db_servername, $db_username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user inputs for security
        $first_name = $conn->real_escape_string($first_name);
        $last_name = $conn->real_escape_string($last_name);
        $email = $conn->real_escape_string($email);
        $contact_number = $conn->real_escape_string($contact_number);
        $address = $conn->real_escape_string($address);

        // Combine first name and last name into one name
        $name = $first_name . ' ' . $last_name;

        // Update user information in database
        if (!empty($password) && isset($hashed_password)) {
            // Update with password change
            $updateUserQuery = "UPDATE customerInfo SET name='$name', email='$email', contactNum='$contact_number', address='$address', password='$hashed_password' WHERE customerID=$user_id";
        } else {
            // Update without password change
            $updateUserQuery = "UPDATE customerInfo SET name='$name', email='$email', contactNum='$contact_number', address='$address' WHERE customerID=$user_id";
        }

        if ($conn->query($updateUserQuery) === TRUE) {
            echo "User information updated successfully.";
            echo "<script>window.close();</script>"; // Close window after successful update
        } else {
            echo "Error updating user information: " . $conn->error;
        }

        // Close database connection
        $conn->close();
    }
}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        input[type="email"],
        input[type="tel"],
        input[type="password"],
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
    <h2>Edit User</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $user_id; ?>" method="post">
        <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="<?php echo $contact_number; ?>" pattern="[0-9]{11}"><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <span class="error"><?php echo $passwordErr; ?></span><br><br>

        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>
