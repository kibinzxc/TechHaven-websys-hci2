<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="logo.jpg" type="x-icon">
    <title>
        <?php echo "Register to Tech Haven"; ?>
    </title>
    <!--css--->
    <link rel="stylesheet" href="style.css">
    <!--font--->
    <link rel="stylesheet" href="font.css">
    <!--icons--->
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">


</head>
<body>
<header class="nav">
        <img src="tech-haven-logo.png" alt="">
        <h4>Tech Haven</h4>
    </header>

    <section class="container">
        <div class="box">
            <h3>Register</h3>
            <form method="">
                <label>Email</label>
                    <div class="fillup">
                        <i class="bi bi-person"></i>                    
                        <input type="text" placeholder="Type your Email" required>
                    </div>
                <label>Password</label>
                    <div class="fillup">
                        <i class="bi bi-lock"></i>
                        <input type="password" placeholder="Type your Password" required>
                        <i class="bi bi-eye-slash"></i>
                    </div>
                <label>Confirm Password</label>
                    <div class="fillup">
                        <i class="bi bi-lock"></i>
                        <input type="password" placeholder="Confirm your Password" required>
                        <i class="bi bi-eye-slash"></i>
                    </div>
            </form>
            <div class="btn-container">
                    <button type="submit">Create Account</button>
                </div>
            <div class="sign-log">
                <p> Already have account? <span id="login">Login</span></p>
            </div>
        </div>
    </section>

    <script>
        
        document.getElementById("login").addEventListener("click", function() {
            window.location.href = "login.php";
        });

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