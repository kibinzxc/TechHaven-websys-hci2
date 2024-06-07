<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title>
        <?php echo "Login to Tech Haven"; ?>
    </title>
    <link rel="stylesheet" href="user-nav.css">
    
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
        <div class="nav-right">
            <i class="bi bi-moon-fill" id="dark-mode-toggle"></i>
            <i class="bi bi-cart3"></i>
            <i class="bi bi-person-circle"></i>
        </div>
    </header>

    <div class="side-nav">
    <i class="bi bi-house-door-fill"></i> <a href="homepage.php">Home</a>
    <i class="bi bi-box-seam-fill"><a href="products.php"></i> Products</a>
    <i class="bi bi-heart-fill"></i><a href="wishlist.php"> Wishlist</a>
    <i class="bi bi-cart-fill"></i><a href="cart.php"> Cart</a>
    <i class="bi bi-clipboard2-check-fill"></i> <a href="orders.php"> Orders</a>
    <i class="bi bi-chat-left-text-fill"></i><a href="support.php"> Support</a>
    </div>

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