<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../portal/logo.jpg" type="image/x-icon">
    <title>Homepage TechHaven</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="../portal/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header class="nav">
        <div class="nav-left">
            <img src="tech-haven-logo2.png" alt="Tech Haven Logo" id="logo">
        </div>
        <div class="nav-middle">
            <input type="text" placeholder="Search..." class="search-bar">
        </div>
        <div class="homepage-nav-right">
            <i class="bi bi-moon-fill" id="dark-mode-toggle"></i>
            <button class="btn-login" type="button" id="loginButton">Login</button>
        </div>  
    </header>   
<?php include 'sidenav.php'; ?>
    <section>
        <!-- Content goes here -->
    </section>
    
    <script>
        const toggle = document.getElementById('dark-mode-toggle');
        const logo = document.getElementById('logo');
        const loginButton = document.getElementById('loginButton');

        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.classList.add('rotate');
            if (document.body.classList.contains('dark-mode')) {
                toggle.classList.remove('bi-moon-fill');
                toggle.classList.add('bi-sun-fill');
                logo.src = '../customer/logo-dark.png';
            } else {
                toggle.classList.remove('bi-sun-fill');
                toggle.classList.add('bi-moon-fill');
                logo.src = '../portal/tech-haven-logo.png';
            }
            setTimeout(() => {
                toggle.classList.remove('rotate');
            }, 400);
        });

        // Redirect to login page when login button is clicked
        loginButton.addEventListener('click', () => {
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>
