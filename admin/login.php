<?php
error_reporting(0);
session_start();

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "th_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

// Redirect to dashboard if already logged in
if (isset($_SESSION['loggedin'])) {
    header('Location: dashboard.php');
    exit();
}

// Handle user login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Escape input data to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = md5($conn->real_escape_string($password));

    // Execute the query
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    // Check the result
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $user['name']; // Store the user's name in the session
        $_SESSION['email'] = $email; // Store the user's email in the session

        header('Location: dashboard.php');
        exit();
    } else {
        $error_message= 'Invalid email or password';
    }

    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <title><?php echo "Admin | Tech Haven"; ?></title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header class="nav">
        <img src="../assets/img/tech-haven-logo2.png" alt="">
    </header>
    <section class="container">
        <div class="box">
            <h3>Administrator</h3>
            <form action="login.php" method="post">
                <label>Email</label>
                <div class="fillup">
                    <i class="bi bi-person"></i>
                    <input type="email" name="email" placeholder="Type your Email" >
                </div>
                <label>Password</label>
                <div class="fillup">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" placeholder="Type your Password" >
                    <i class="bi bi-eye-slash"></i>
                </div>
                <?php
                if ($error_message) {
                    echo "<p style='color:red;text-align:center;margin-top:-10px;font-size:12px;'>$error_message</p>";
                }
                ?>
                <div class="btn-container">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        document.querySelectorAll('.bi-eye-slash').forEach(function(icon) {
            icon.style.marginLeft = '10%';
            icon.style.fontSize = 'large';
            icon.addEventListener('click', function() {
                var passwordInput = icon.previousElementSibling;
                passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        });
    </script>
</body>
</html>
