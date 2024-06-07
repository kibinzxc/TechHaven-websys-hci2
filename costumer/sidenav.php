<style>
    .side-nav {
    position: fixed;
    margin-top: 7%;
    left: -6px;
    width: 60px;
    height: 250px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    padding: 10px 0;
    border: black solid 2px;
}

.side-nav i {
    font-size: 18px;
    cursor: pointer;
    transition: color 0.3s;
}

.side-nav a {
    font-size: 8px;
    font-family: 'Poppins', sans-serif;
    color: #000; /* Default text color */
    text-decoration: none; /* Remove underline */
}

.side-nav i:hover {
    color: #007bff;
}

.dark-mode {
    background-color: #2c2c2c;
    color: #fff;
}

.dark-mode .nav {
    background-color: #1c1c1c;
}

.dark-mode .side-nav {
    background-color: #333;
}

.dark-mode .search-bar {
    background-color: #555;
    color: #fff;
    border: 1px solid #444;
}

.dark-mode .nav-right i,
.dark-mode .side-nav i {
    color: #fff;
}

.rotate {
    animation: rotate 0.4s ease-in-out;
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(180deg);
    }
}
</style>

<body>
    <header class="nav">
        <div class="nav-left">
            <img src="../portal/tech-haven-logo.png" alt="Tech Haven Logo" id="logo">
            <h4>Tech Haven</h4>
        </div>
        <div class="nav-middle">
            <input type="text" placeholder="Search..." class="search-bar" id="search-bar" oninput="searchProducts()">
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
</body>
