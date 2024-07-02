<?php
session_start();
include 'dbcon.php';
$customerID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "View Product"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <?php include 'sidenav.php'; ?>

    <main>
        <div class="product-container">
            <div class="product-images">
                <div class="main-image">
                    <img src="../costumer/main-item.png" alt="Rakk Alkus RGB Gaming Mouse">
                </div>
                <div class="thumbnail-images">
                    <img src="../costumer/item-side.png" alt="Rakk Alkus RGB Gaming Mouse">
                    <img src="../costumer/item-side2.png" alt="Rakk Alkus RGB Gaming Mouse">
                    <img src="../costumer/item-front.png" alt="Rakk Alkus RGB Gaming Mouse">
                </div>
            </div>
            <div class="product-info">
                <h1>Rakk Alkus RGB Gaming Mouse</h1>
                <div class="prices">₱ 895.00</div>
                    <div class="seperator"></div>
                    <div class="categories">
                        <h4>Categories: Mouse</h4>
                    </div>
                    <div class="quantity">
                        <label for="quantity">Quantity:</label>
                        <div class="quantity-control">
                            <button id="decrease">-</button>
                            <input type="number" id="quantity" name="quantity" min="1" value="1">
                            <button id="increase">+</button>
                        </div>
                        <span class="quantity-available">5350 pieces available</span>
                    </div>
                    <div class="shipping">
                        <h3>Shipping:</h3>
                        <div class="shipping-info">
                            <i class="bi bi-truck"></i>
                            <div>
                                <p>Shipping To: Metro Manila</p>
                                <p>Shipping Fee: ₱0 - ₱30</p>
                            </div>
                        </div>
                    </div>
                    <div class="rating">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p>4.5 (53)</p>
                        <div class="sold">
                            <i class="bi bi-cart-check"></i>
                            <span>Sold (153)</span>
                        </div>  
                    </div>
                <div class="buttons">
                    <button class="add-to-cart"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    <button class="buy-now">Buy Now</button>
                </div>
            </div>
        </div>

            <div class="product-details">
                <div class="header">
                    <h2>Product Description</h2>
                    <p>Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <div class="header">
                    <h2>Product Specification</h2>
                    <ul>
                        <li><strong>Brand:</strong> Lorem Ipsum</li>
                        <li><strong>Model:</strong> Lorem Ipsum</li>
                        <li><strong>Manufacturer:</strong> Lorem Ipsum</li>
                    </ul>
                </div>
                <div class="header">
                    <h2>Customer Ratings & Reviews</h2>
                    <div class="rating-summary">
                        <span class="rating-average">5</span>
                        <div class="star-rating">★★★★★</div>
                        <span class="review-count">5 Reviews</span>
                    </div>
                </div>
                <div class="header">
                    <div class="review">
                        <div class="reviewer-info">
                            <img src="placeholder-avatar.png" class="avatar">
                            <div>
                                <strong>Juan Dela Cruz</strong>
                                <div class="star-rating">★★★★★</div>
                                <small>2023-05-28 08:00 PM</small>
                            </div>
                        </div>
                        <p>The item is in good condition and well packed. I will surely buy next time I'm hoping it will last longer. Thank you seller until next time.</p>
                    </div>
    
                    <div class="review">
                        <div class="reviewer-info">
                            <img src="placeholder-avatar.png" class="avatar">
                            <div>
                                <strong>Juan Dela Cruz Jr.</strong>
                                <div class="star-rating">★★★★★</div>
                                <small>2023-05-28 09:00 PM</small>
                            </div>
                        </div>
                        <p>Nice item, great! fully functional and fast delivery.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="related">
            <h3>Related Items</h3>
                <div class="related-items">
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
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
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
        </div>
    </main>
    
    <script>
        const toggle = document.getElementById('dark-mode-toggle');
        const logo = document.getElementById('logo');

        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.classList.add('rotate');
            if (document.body.classList.contains('dark-mode')) {
                toggle.classList.remove('bi-moon-fill');
                toggle.classList.add('bi-sun-fill');
                logo.src = 'logo_dark.png';
            } else {
                toggle.classList.remove('bi-sun-fill');
                toggle.classList.add('bi-moon-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            }
            setTimeout(() => {
                toggle.classList.remove('rotate');
            }, 400);
        });

        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const quantityInput = document.getElementById('quantity');

        decreaseButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        quantityInput.addEventListener('keydown', (event) => {
            event.preventDefault();
        });

    </script>
</body>
</html>