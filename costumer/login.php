<?php
session_start();
include 'dbcon.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customerinfo WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $customerID;
        header("Location: index.php");
        exit();


    } else {
        $loginError = true;
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
                    <input type="text" name="email" placeholder="Type your Email" required>
                </div>
                <label>Password</label>
                <div class="fillup">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" placeholder="Type your Password" required>
                    <i class="bi bi-eye-slash"></i>
                </div>
                <p><a href="#">Forget Password?</a></p>
                <div id="popup">
                    <p id="popup-message"></p>
                </div>
                <div class="btn-container">
                    <button type="submit">Login</button>
                </div>
                <div class="sign-log">
                    <p> Don’t have an account yet? <span id="register">Create Account</span></p>
                </div>
            </form>
        </div>
    </section>
<<<<<<< HEAD
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.bi-eye-slash').forEach(function(icon) {
                icon.style.marginLeft = '6%';
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

            const register = document.getElementById('register');
            register.addEventListener('click', () => {
                window.location.href = 'register.php';
            });
            
            // Display popup if login was unsuccessful
            <?php if ($loginError): ?>
                                                                var popup = document.getElementById("popup");
                                                                var popupMessage = document.getElementById("popup-message");

                                                                // Set the error message
                                                                popupMessage.innerText = "Wrong credentials. Invalid email or password.";

                                                                // Style the popup
                                                                popup.style.display = "block";
                                                                popup.style.backgroundColor = '#f8d7da';
                                                                popup.style.color = '#842029';
                                                                popup.style.border = '2px solid #f5c2c7';
                                                                popup.style.padding = '10px';
                                                                popup.style.font = 'normal 500 13px/normal "Poppins"';
                                                                popup.style.borderRadius = '5px';
                                                                popup.style.textAlign = 'center';

                                                                // Close the popup after 7 seconds
                                                                setTimeout(function () {
                                                                    popup.style.display = "none";
                                                                }, 7000);
            <?php endif; ?>

        });
    const logo = document.getElementById('logo');
    logo.addEventListener('click', () => {
        window.location.href = 'homepage.php';
    });
</script>

</body>
</html>
