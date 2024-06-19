<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title>
        <?php echo "Homepage TechHaven"; ?>
    </title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="../portal/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>


    
    <section>
        <div class="homepage-content">
            <div class="content-left">
                <img src="homepagepic.png" alt="Homepage Picture">
            </div>
            <div class="content-right">
                <h1>Elevate your experience,</h1>
                <h2>Discover your sanctuary</h2>
                <button class="btn-shop-now">Shop Now</button>
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

    loginButton.addEventListener('click', () => {
        window.location.href = 'login.php';
    });
</script>
</html>