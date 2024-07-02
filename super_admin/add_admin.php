<?php
session_start();

// Define variables and initialize with empty values
$first_name = $last_name = $email = $contact_number = $address = $user_password = "";
$nameErr = $emailErr = $passwordErr = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty($_POST["first_name"])) {
        $nameErr = "First name is required";
    } else {
        $first_name = test_input($_POST["first_name"]);
    }

    // Validate last name
    if (empty($_POST["last_name"])) {
        $nameErr = "Last name is required";
    } else {
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
        if (!preg_match("/^[0-9]{11}$/", $contact_number)) {
            $contact_number = "Invalid contact number format";
        }
    }

    // Validate address
    if (empty($_POST["address"])) {
        $address = "";
    } else {
        $address = test_input($_POST["address"]);
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $user_password = test_input($_POST["password"]);
        // Password validation criteria
        $uppercase = preg_match('@[A-Z]@', $user_password);
        $lowercase = preg_match('@[a-z]@', $user_password);
        $number    = preg_match('@[0-9]@', $user_password);
        $specialChars = preg_match('@[^\w]@', $user_password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($user_password) < 8) {
            $passwordErr = "Password must be at least 8 characters long, and include at least one uppercase letter, one lowercase letter, one number, and one special character";
        }
    }

    // If all validations are passed, proceed with database insertion
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        // Database connection details
        $servername = "localhost"; // Replace with your server name
        $username = "root"; // Replace with your database username
        $db_password = ""; // Replace with your database password
        $dbname = "th_db"; // Replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user inputs for security
        $first_name = $conn->real_escape_string($first_name);
        $last_name = $conn->real_escape_string($last_name);
        $email = $conn->real_escape_string($email);
        $user_password = $conn->real_escape_string($user_password);

        // Combine first name and last name into one name
        $name = $first_name . ' ' . $last_name;

        // Hash the password using MD5 (consider using bcrypt or Argon2 for better security)
        $hashed_password = md5($user_password);

        // Insert new user into database
        $insertUserQuery = "INSERT INTO admin (name, email, password, role) 
                        VALUES ('$name', '$email', '$hashed_password', 'admin')";

        if ($conn->query($insertUserQuery) === TRUE) {
            echo "New admin user added successfully.";
        } else {
            echo "Error: " . $insertUserQuery . "<br>" . $conn->error;
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
    <title>Add New Admin User</title>
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
    <h2>Add New Admin User</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="Enter first name" value="<?php echo $first_name; ?>" required>
        <span class="error"><?php echo $nameErr; ?></span><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo $last_name; ?>" required>
        <span class="error"><?php echo $nameErr; ?></span><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo $email; ?>" required>
        <span class="error"><?php echo $emailErr; ?></span><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span class="error"><?php echo $passwordErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
