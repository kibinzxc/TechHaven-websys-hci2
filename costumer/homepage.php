<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title>
        <?php echo "Homepage TechHaven"; ?>
    </title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="../portal/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <header class="nav">
            <div class="nav-left">
                <img src="../portal/tech-haven-logo.png" alt="Tech Haven Logo" id="logo">
                <h4>Tech Haven</h4>
            </div>
            <div class="nav-middle">
                <input type="text" placeholder="Search..." class="search-bar">
            </div>
            <div class="homepage-nav-right">
                <i class="bi bi-moon-fill" id="dark-mode-toggle"></i>
                <button class="btn-login" type="submit" >Login</button>
            </div>  
    </header>   

    
    <section>
        <div class="homepage-content">
            <div class="content-left">
                <img src="homepagepic.png" alt="Homepage Picture">
            </div>
            <div class="content-right">
                <h1>Elevate your experience,</h1>
                <h2>Discover your sanctuary</h2>
                <button class="btn-shop-now">Shop Now</button>
            </div>
        </div>

<?php include 'sidenav.php'; ?>
    
    <section>


    </section>
    
</body>

<script>
    const toggle = document.getElementById('dark-mode-toggle');
    const logo = document.getElementById('logo');

    toggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        toggle.classList.add('rotate');
        if (document.body.classList.contains('dark-mode')) {
            toggle.classList.remove('bi-moon-fill');
            toggle.classList.add('bi-sun-fill');
            logo.src = '../costumer/logo-dark.png';
        } else {
            toggle.classList.remove('bi-sun-fill');
            toggle.classList.add('bi-moon-fill');
            logo.src = '../portal/tech-haven-logo.png';
        }
        setTimeout(() => {
            toggle.classList.remove('rotate');
        }, 400);
    });
    </script>
</html>