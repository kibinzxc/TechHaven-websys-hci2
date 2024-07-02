<?php
session_start();
include 'dbcon.php';

// Redirect to dashboard if already logged in


// Initialize error message variable
$error_message = '';

// Handle user login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Escape input data to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = md5($conn->real_escape_string($password));

    // Execute the query
    $query = "SELECT * FROM customerinfo WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    // Check the result
    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();

        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $user['name']; // Store the user's name in the session
        $_SESSION['email'] = $email; // Store the user's email in the session

        // Redirect to dashboard based on role (not considering role in this case)
        redirectToDashboard();
    } else {
        $error_message = 'Invalid email or password'; // Set error message for incorrect login
    }

    // Close the connection
    $conn->close();
}

function redirectTo($location) {
    header("Location: $location");
    exit();
}

function redirectToDashboard() {
    header("Location: homepage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <title>Login | Tech Haven</title>
    <link rel="stylesheet" href="../costumer/css/style.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
<header class="nav">
    <img src="../assets/img/tech-haven-logo2.png" id="logo">
</header>
<section class="container">
    <div class="box">
        <h3>Login</h3>

        <form action="login.php" method="post">
            <label>Email</label>
            <div class="fillup">
                <i class="bi bi-person"></i>
                <input type="email" name="email" placeholder="Type your Email" required>
            </div>
            <label>Password</label>
            <div class="fillup">
                <i class="bi bi-lock"></i>
                <input type="password" name="password" placeholder="Type your Password" required>
                <i class="bi bi-eye-slash toggle-password"></i>
            </div>
            <p><a href="#">Forget Password?</a></p>
            <div id="popup">
                <p id="popup-message"></p>
            </div>
            <div class="btn-container">
                <button type="submit">Login</button>
            </div>
                        <?php if (!empty($error_message)): ?>
            <div class="error" style="text-align:center;"><?php echo $error_message; ?></div>
        <?php endif; ?>
            <p style="margin-left:15px; font-size:14px;">Don’t have an account yet? <a href="register.php" id="register" style="display: inline-block; color:blue;">Create Account</a></p>
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
    
    const logo = document.getElementById('logo');
    logo.addEventListener('click', () => {
        window.location.href = 'homepage.php';
    });

    
</script>

</body>
</html>
