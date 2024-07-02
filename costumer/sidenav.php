<style>
        * {
            margin: 0;
            box-sizing: border-box;
            padding: 0;
        }

        :root {
            --lightColor: #F5F5F5;
            --shadedColor: #E7E7E7;
            --darkModeNav: #292929;
            --darkBody: #5C5C5C;
        }

        body.dark-mode {
            background-color: var(--darkBody);
            color: white;
        }

        .dark-mode .nav {
            background-color: var(--darkModeNav);
            color: var(--lightColor);

        }

        .dark-mode .side-nav a{
            color: var(--lightColor);

        }

        .dark-mode .search-bar {
            background-color: var(--lightColor);
        }

        .dark-mode .nav-right i {
            color: var(--lightColor);
        }

        .rotate {
            animation: rotate 0.5s ease-in-out;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

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
            width: 150px;
        }

        .nav-left {
            padding-left: 20px;
        }

        .nav-left,
        .nav-middle,
        .nav-right {
            display: flex;
            align-items: center;
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
            margin-right:10px;
        }

        .nav-right {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right: 3%;
}

.profile-icon-container {
    position: relative;
}

.logout-btn {
    position: absolute;
    top: calc(70% + 10px); 
    left: 50%;
    transform: translateX(-40%);
    background-color: #fff; 
    padding: 8px 12px; 
    border-radius: 5px; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    display: none; 
    font: normal 600 15px/normal 'Inter';
}

.profile-icon-container.active .logout-btn {
    display: block;
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
            text-align: center; /* Center align text */
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

        .nav-right a {
            color: black; /* Set the color to black */
            text-decoration: none; /* Remove underline */
        }

        .nav-right a:hover {
            color: black; /* Maintain black color on hover */
        }

        .nav-right i {
            color: black; /* Ensure all icons are black */
        }
    </style>
<head>
<link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header class="nav">
        <div class="nav-left">
        <img src="tech-haven-logo2.png" alt="Tech Haven Logo" id="logo">
           
        </div>
        <div class="nav-middle">
            <input type="text" placeholder="Search..." class="search-bar" id="search-bar" oninput="searchProducts()">
        </div>
        <div class="nav-right">
        <i class="bi bi-moon-fill" id="dark-mode-toggle"></i>
        <i class="bi bi-cart3"></i>
        <div class="profile-icon-container">
            <a href="profile.php" id="profile-link">
                <i class="bi bi-person-circle"></i>
            </a>
            <a href="logout.php"><i class="bi bi-box-arrow-left"></i></a>
        </div>
    </div>
    </div>
    </header>

    <div class="side-nav">
    <a href="homepage.php">
    <i class="bi bi-house-door-fill"></i><br>
    Home
</a>

<a href="products.php">
    <i class="bi bi-box-seam-fill"></i><br>
    Products
</a>


<a href="cart.php">
    <i class="bi bi-cart-fill"></i><br>
    Cart
</a>

<a href="orders.php">
    <i class="bi bi-clipboard2-check-fill"></i><br>
    Orders
</a>

<a href="support.php">
    <i class="bi bi-chat-left-text-fill"></i><br>
    Support
</a>
    </div>
</body>
<script>
    // Get elements
    const profileContainer = document.querySelector('.profile-icon-container');
    const logoutBtn = document.querySelector('.logout-btn');

    // Add event listeners for mouseenter and mouseleave
    profileContainer.addEventListener('mouseenter', function() {
        profileContainer.classList.add('active'); // Add active class to profile icon container
        logoutBtn.style.display = 'block'; // Show logout button
    });

    profileContainer.addEventListener('mouseleave', function() {
        profileContainer.classList.remove('active'); // Remove active class from profile icon container
        logoutBtn.style.display = 'none'; // Hide logout button
    });
</script>
