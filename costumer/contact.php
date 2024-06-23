<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "Contact Us"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>

<?php include 'sidenav.php'; ?>

    <div class="contact-container">
        <h2>Contact Us</h2>
        <div class="contact-content">
            <div class="contact-info">
                <p>Have any questions? We would be happy to help you.</p>
                <div class="contact-item">
                    <i class="bi bi-telephone"></i> Globe: 0999 999 9999
                </div>
                <div class="contact-item">
                    <i class="bi bi-envelope"></i> techhaven.support@gmail.com
                </div>
                <div class="contact-item">
                    <i class="bi bi-geo-alt"></i> Imus City, Cavite, PH
                </div>
            </div>
            <div class="contact-form">
                <input type="text" placeholder="First Name:">
                <input type="text" placeholder="Last Name:">
                <input type="email" placeholder="Email:">
                <input type="tel" placeholder="Phone Number:">
                <textarea placeholder="Message:"></textarea>
                <button>Send Message ➤</button>
            </div>
        </div>
    </div>

</body>
</html>