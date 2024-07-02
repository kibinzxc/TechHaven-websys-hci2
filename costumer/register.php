<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="logo.jpg" type="x-icon">
    <title>
        <?php echo "Register to Tech Haven"; ?>
    </title>
    <!--css--->
    <link rel="stylesheet" href="../costumer/css/style.css">
    <!--font--->
    <link rel="stylesheet" href="../costumer/css/font.css">    
    <!--icons--->
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">


</head>
<body>
<header class="nav">
        <img src="tech-haven-logo2.png" alt="">
    </header>
<style>

</style>
<br><br><br>
    <section class="container">
        <div class="box" style="height:auto;">
            <h3>Register</h3>
            <form method="POST" action="register_process.php" onsubmit="return validateForm()">
                <label>Name</label>
                <div class="input-group name-container">
                    <div class="fillup">
                        <i class="bi bi-person"></i>
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="fillup">
                        <i class="bi bi-person"></i>
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>

                <label>Address</label>
                <div class="input-group address-container">
                    <div class="fillup">
                        <i class="bi bi-house-door"></i>
                        <input type="text" name="house_number_street" placeholder="House No., Street" required>
                    </div>
                    <div class="fillup">
                        <i class="bi bi-geo-alt"></i>
                        <input type="text" name="city_province" placeholder="City, Province" required>
                    </div>
                </div>

                <label>Email</label>
                <div class="fillup">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="email" placeholder="Type your Email" required>
                </div>

                <label>Contact Number</label>
                <div class="fillup">
                    <i class="bi bi-phone"></i>
                    <input type="text" name="contact_number" placeholder="Enter your Contact Number" required>
                </div>

                <label>Password</label>
                <div class="fillup">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" placeholder="Type your Password" required oninput="checkPasswordStrength(this)">
                    <i class="bi bi-eye-slash toggle-password"></i>
                </div>

                <label>Confirm Password</label>
                <div class="fillup">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="confirm_password" placeholder="Confirm your Password" required oninput="checkPasswordStrength(this)">
                    <i class="bi bi-eye-slash toggle-password"></i>
                </div>

                <div>
                    <div class="terms">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the <a href="terms-and-conditions.php"><b>Terms and Conditions</b></a></label>
                    </div>
                </div>

                <div id="password-strength" style="display:none;"></div>
                <div class="btn-container">
                    <button type="submit">Register</button>
                </div>
            </form>

            <div class="sign-log" style="margin-top:-20px;margin-bottom:10px;">
                <p>Already have an account? <span id="login">Login</span></p>
            </div><br> <br>
        </div>
    </section><br><br>
<script>
    function validateForm() {
        if (!passwordsMatch()) {
            const strength = document.getElementById('password-strength');
            strength.textContent = 'Password and Confirm Password do not match.';
            strength.style.backgroundColor = '#f8d7da';
            strength.style.color = '#842029';
            strength.style.border = '2px solid #f5c2c7';
            return false;
        }
        return true; 

        /***For Terms and Conditions validation ***/
        if (!passwordsMatch()) {
    
        return false;
        }

        const termsCheckbox = document.getElementById('terms');
        if (!termsCheckbox.checked) {
            alert('Please accept the Terms and Conditions.');
            return false;
        }

        return true;
    }


    function passwordsMatch() {
        const password = document.getElementsByName('password')[0].value;
        const confirmPassword = document.getElementsByName('confirm_password')[0].value;
        return password === confirmPassword;
    }

    function checkPasswordStrength(input) {
        const password = input.value;
        const strength = document.getElementById('password-strength');
        const firstInput = document.getElementsByName('password')[0];

        let passwordStrength = 0;

        if (password.length >= 8) passwordStrength++;
        if (/[A-Z]/.test(password)) passwordStrength++;
        if (/[a-z]/.test(password)) passwordStrength++;
        if (/[0-9]/.test(password)) passwordStrength++;
        if (/[!@#\$%^&*]/.test(password)) passwordStrength++;

        switch (passwordStrength) {
            case 1:
                strength.textContent = 'Weak password';
                strength.style.backgroundColor = '#f8d7da';
                strength.style.color = '#842029';
                strength.style.border = "2px solid #f5c2c7";
                firstInput.setCustomValidity('Weak password');
                break;
            case 2:
                strength.textContent = 'Moderate password';
                strength.style.backgroundColor = '#fff3cd';
                strength.style.color = '#664d03';
                strength.style.border = "2px solid #ffecb5";
                firstInput.setCustomValidity('');
                break;
            case 3:
                strength.textContent = 'Strong password';
                strength.style.backgroundColor = '#d1e7dd';
                strength.style.color = '#0f5132';
                strength.style.border = "2px solid #badbcc";
                firstInput.setCustomValidity('');
                break;
            case 4:
            case 5:
                strength.textContent = 'Very strong password';
                strength.style.backgroundColor = '#ace7cd';
                strength.style.color = '#0a5331';
                strength.style.border = "2px solid #badbcc";
                firstInput.setCustomValidity('');
                break;
            default:
                strength.textContent = 'Password should contain at least 8 characters, including upper and lower case letters, numbers, and special characters.';
                strength.style.backgroundColor = '#f8d7da';
                strength.style.color = '#842029';
                strength.style.border = "2px solid #f5c2c7";
                firstInput.setCustomValidity('Weak password');
                break;
        }

        strength.style.display = 'block';
    }

    document.getElementById("login").addEventListener("click", function() {
        window.location.href = "login.php";
    });

    document.querySelectorAll('.bi-eye-slash').forEach(function(icon) {
        icon.style.marginLeft = '5%';
        icon.style.fontSize = 'large';

        icon.addEventListener('click', function() {
            var passwordInput = icon.previousElementSibling;
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    });




</script>
</body>
</html>