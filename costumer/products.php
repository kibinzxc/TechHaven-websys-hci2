<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title>
        <?php echo "Login to Tech Haven"; ?>
    </title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="../portal/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <header class="nav">
        <div class="nav-left">
            <img src="../portal/tech-haven-logo.png" id="logo">
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


    <section class="section-container">

        <div class="search-filters">
            <div class="filter-group">
                <div class="top">
                    <i class="bi bi-funnel-fill"></i>
                    <h4>SEARCH FILTERS</h4>
                </div>
                <label for="category-filter">Category:</label>
                <div>
                    <input type="checkbox" id="electronics" name="category" value="electronics">
                    <label for="electronics">Lorem Ipsum</label>
                </div>
                <div>
                    <input type="checkbox" id="clothing" name="category" value="clothing">
                    <label for="clothing">Lorem Ipsum</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sort">
                <h5>Sort By:</h5>
                <select>
                    <option value="">Oldest First</option>
                    <option value="">Oldest First</option>
                    <option value="">Oldest First</option>
                </select>
            </div>
            <div class="num_page">

            </div>
        </div>
        <div class="product-list">

        </div>
    </section>
</body>
    
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