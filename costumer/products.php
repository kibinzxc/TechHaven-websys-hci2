<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "View Product list"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
   
    <?php include 'sidenav.php'; ?>
    <section class="container">
        <div class="search-filters">
            <div class="filter-group">
                <div class="top">
                    <i class="bi bi-funnel-fill"></i>
                    <h4>SEARCH FILTERS</h4>
                </div>
                <div class="category">
                    <label for="category-filter">CATEGORIES:</label>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="brand">
                    <label for="category-filter">BRAND:</label>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                    <div>
                        <input type="checkbox" id="electronics" name="category" value="electronics">
                        <label for="electronics">Lorem Ipsum</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="row">
                <div class="sort">
                    <h5>Sort By:</h5>
                    <select>
                        <option value="">Oldest First</option>
                        <option value="">Newest First</option>
                        <option value="">Price Low to High</option>
                        <option value="">Price High to Low</option>
                    </select>
                </div>
                <div class="num_page">
                    <span class="current">1/10</span>
                    <button class="prev" disabled>&lt;</button>
                    <button class="next">&gt;</button>
                </div>
            </div>
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
                            <i class="bi bi-heart heart-icon" data-filled="false"></i>
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
            <div class="page-num">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </section>

    <script>

        document.querySelectorAll('.heart i').forEach(heartIcon => {
            heartIcon.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevent the click event from bubbling up to the product item
                heartIcon.classList.toggle('bi-heart');
                heartIcon.classList.toggle('bi-heart-fill');
                heartIcon.classList.toggle('heart-filled');
            });
        });

        const toggle = document.getElementById('dark-mode-toggle');
        const logo = document.getElementById('logo');

        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.classList.add('rotate');
            if (document.body.classList.contains('dark-mode')) {
                toggle.classList.remove('bi-moon-fill');
                toggle.classList.add('bi-sun-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            } else {
                toggle.classList.remove('bi-sun-fill');
                toggle.classList.add('bi-moon-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            }
            setTimeout(() => {
                toggle.classList.remove('rotate');
            }, 400);
        });

        function searchProducts() {
            const searchBar = document.getElementById('search-bar');
            const filter = searchBar.value.toLowerCase();
            const products = document.querySelectorAll('.product-item');

            products.forEach(product => {
                const productName = product.getAttribute('data-name').toLowerCase();
                if (productName.includes(filter)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        document.getElementById('search-bar').addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                searchProducts();
            }
        });

        function handleProductClick(productName) {
        // Navigate to view-prod.php with the product name as a query parameter
            window.location.href = `view-prod.php?product=${encodeURIComponent(productName)}`;
        }
    
        // Add click event listeners to all product items
        document.querySelectorAll('.product-item').forEach(item => {
            item.addEventListener('click', () => {
                const productName = item.getAttribute('data-name');
                handleProductClick(productName);
            });
        });

        
    </script>
</body>
</html>
