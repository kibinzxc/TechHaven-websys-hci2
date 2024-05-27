<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="logo.jpg" type="x-icon">
    <title>
        <?php echo "Login to Tech Haven"; ?>
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>

    <header class="nav">
        <img src="tech-haven-logo.png" alt="">
        <h4>Tech Haven</h4>
    </header>

    <section class="container">
        <div class="box">
            <h3>Login</h3>
                <form>
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
                    <p><a href="#">Forget Password?</a><p>
                </form>
                <div class="btn-container">
                    <button type="submit">Login</button>
                </div>
                <div class="sign-log">
                    <p> Don’t have any account? <span id="register">Signup</span></p>
                </div>
        </div>
    </section>
    <script>
        document.getElementById("register").addEventListener("click", function() {
            window.location.href = "register.php";
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