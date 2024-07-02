<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../costumer/logo.jpg" type="x-icon">
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
        <div class="contact-content">
            <div class="contact-info">
                <h2>Contact Us</h2>
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
                <form action="your_form_processing_script.php" method="post">
                    <div class="form-row">
                        <div class="form-column">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" required>
                        </div>
                        <div class="form-column">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lname" required>
                        </div>
                    </div>

                    <div class="online-form">
                        <div class="form-information">
                            <label for="email">Email:</label> 
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-information">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-information">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit">Send Message ➤</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
