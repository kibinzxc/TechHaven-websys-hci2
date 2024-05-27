<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="logo.jpg" type="x-icon">
    <title>
        <?php echo "Register to Tech Haven"; ?>
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
                    </div>
                <label>Confirm Password</label>
                    <div class="fillup">
                        <i class="bi bi-lock"></i>
                        <input type="password" placeholder="Confirm your Password" required>
                        <i class="bi bi-eye"></i>
                    </div>
            </form>
            <div class="btn-container">
                    <button type="submit">Login</button>
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
    </script>
</body>
</html>