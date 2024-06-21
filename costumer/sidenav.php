<style>
.nav {
    background: var(--lightColor);
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 4rem;
    font: italic 600 20px/normal 'Inter';
    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.25);
}
.nav img {
    width: 10%;
    position: absolute;
}

.nav-middle {
    flex: 1;
    display: flex;
    justify-content: center;
}

.search-bar {
    width: 100%;
    max-width: 450px;
    padding: 0.5px;
    background-color: var(--shadedColor);
    border-radius: 20px;
    padding: 5px;
    border: none;
    outline: none;
}

.nav-right {
    display: flex;
    justify-content: space-between;
    margin-right: 3%;
}

.nav-right i {
    margin: 5px;
    cursor: pointer;
}

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
    z-index: 1;
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
    color: #000; 
    text-decoration: none; 
}

.side-nav i:hover {
    color: #5C5C5C;
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


    <div class="side-nav">
        <i class="bi bi-house-door-fill"></i> <a href="index.php">Home</a>
        <i class="bi bi-box-seam-fill"><a href="products.php"></i> Products</a>
        <i class="bi bi-heart-fill"></i><a href="wishlist.php"> Wishlist</a>
        <i class="bi bi-cart-fill"></i><a href="cart.php"> Cart</a>
        <i class="bi bi-clipboard2-check-fill"></i> <a href="orders.php"> Orders</a>
        <i class="bi bi-chat-left-text-fill"></i><a href="support.php"> Support</a>
    </div>
</body>
