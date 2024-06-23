<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../portal/logo.jpg" type="image/x-icon">
    <title>Homepage TechHaven</title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>  
<?php include 'sidenav.php'; ?>
<section>
<div class="homepage-content">
            <div class="content">
                <img src="homepagepic.png" alt="Homepage Picture">
            </div>
            <div class="right">
                <h1><span>Elevate</span> your experience, <br>Discover your <span>sanctuary</span></h1>
                <button class="btn-shop-now" id="products">Shop Now</button>
            </div>
        </div>
        
        <div class="main-content">
            <div class="product-list" id="product-list">
                <div class="product-item" data-name="Rakk Aporo RGB Gaming Mouse">
                        <div class="product-header">
                            <div class="stars">
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="heart">
                                <i class="bi bi-heart"></i>
                            </div>
                        </div>
                        <img src="item.png">
                            <h5>Mouse</h5>
                            <p>Rakk Aporo RGB Gaming Mouse</p>
                            <div class="price">₱350.00</div>
                        <div class="btn-item">
                            <button class="add-cart">
                                <i class="bi bi-cart-plus-fill"></i> Add to cart 
                            </button>
                            <button class="buy">BUY NOW</button>
                        </div>
                    </div>

                    <div class="product-item" data-name="Rakk Aporo RGB Gaming Mouse">
                        <div class="product-header">
                            <div class="stars">
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="heart">
                                <i class="bi bi-heart"></i>
                            </div>
                        </div>
                        <img src="item.png" alt="Product 1">
                            <h5>Product 1</h5>
                            <p>Rakk Aporo RGB Gaming Mouse</p>
                            <div class="price">₱350.00</div>
                        <div class="btn-item">
                            <button class="add-cart">
                                <i class="bi bi-cart-plus-fill"></i> Add to cart 
                            </button>
                            <button class="buy">BUY NOW</button>
                        </div>
                    </div> 

                    <div class="product-item" data-name="RAKK Ilis RGB Mechanical Keyboard Gateron Yellow">
                        <div class="product-header">
                            <div class="stars">
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="heart">
                                <i class="bi bi-heart"></i>
                            </div>
                        </div>
                        <img src="item-2.png" style="height: 130px;">
                            <h5>Keyboard</h5>
                            <p>RAKK Ilis RGB Mechanical Keyboard Gateron Yellow</p>
                            <div class="price">₱2,395.00</div>
                        <div class="btn-item">
                            <button class="add-cart">
                                <i class="bi bi-cart-plus-fill"></i> Add to cart 
                            </button>
                            <button class="buy">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>    
    
    <section>
    
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
