<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">


    <title>
        <?php echo "Homepage TechHaven"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
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
            <button class="btn-login" id="login-button">Login</button>
        </div>  
    </header>       
        
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
        
        <div class="main-content-homepage">
            <div class="title-prod">
                <h1>Featured</h1>
            </div>
            <div class="homepage-prod-list" id="product-list">                   
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

            </div>
        </div>
    <section>



    </section>
    
</body>

<script>
    const toggle = document.getElementById('dark-mode-toggle');
    const logo = document.getElementById('logo');
    const loginButton = document.getElementById('login-button');

    toggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        toggle.classList.add('rotate');
        if (document.body.classList.contains('dark-mode')) {
            toggle.classList.remove('bi-moon-fill');
            toggle.classList.add('bi-sun-fill');
            logo.src = 'tech-haven-logo2.png';
        } else {
            toggle.classList.remove('bi-sun-fill');
            toggle.classList.add('bi-moon-fill');
            logo.src = 'tech-haven-logo2.png';
        }
        setTimeout(() => {
            toggle.classList.remove('rotate');
        }, 400);
    });

    loginButton.addEventListener('click', () => {
        window.location.href = 'login.php';
    });

    const products = document.getElementById('products');
        products.addEventListener('click', () => {
            window.location.href = 'products.php';
        });
</script>
</html>