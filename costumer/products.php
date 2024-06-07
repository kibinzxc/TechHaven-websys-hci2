<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
</head>
<body>
<?php include 'sidenav.php'; ?>
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

    
    <section>

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

</html>