<?php
session_start();

function login($email, $password) {
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "th_db";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_hashed_password);
        $stmt->fetch();

        $hashed_password = md5($password);

        // Verify password
        if ($hashed_password === $stored_hashed_password) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

// Handle form submission
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_success = login($email, $password);

    if ($login_success) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <title><?php echo "Login | Tech Haven"; ?></title>
    <link rel="stylesheet" href="../costumer/css/style.css">
    <link rel="stylesheet" href="../assets/font/inter.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
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
                    <i class="bi bi-eye-slash"></i>
                </div>
                <?php
                if ($error_message) {
                    echo "<p style='color:red;text-align:center;margin-top:-10px;font-size:12px;'>$error_message</p>";
                }
                ?>
                <p><a href="#">Forget Password?</a></p>
                <div class="btn-container">
                    <button type="submit">Login</button>
                </div>
                <div class="sign-log">
                    <p> Don’t have an account yet? <span id="register">Create Account</span></p>
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

        const logo = document.getElementById('logo');
        logo.addEventListener('click', () => {
            window.location.href = 'homepage.php';
        });
    </script>
</body>
</html>
