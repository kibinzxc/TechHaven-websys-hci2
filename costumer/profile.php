<?php
session_start();
include 'dbcon.php';
$email = $_SESSION['email'];



// Redirect to login page if the user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}



// Fetch customer data from the database
$sql = "SELECT name, email, contactNum, address FROM customerinfo WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data as associative array
    $row = $result->fetch_assoc();

    // Assign fetched data to variables
    $name = $row['name'];
    $email = $row['email'];
    $contactNum = $row['contactNum'];
    $address = $row['address'];

    $phone = $row['contactNum'];
} else {
    echo "Customer data not found!";

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
   
</head>
    <style>
        *{
         
            font-family: 'Poppins', sans-serif;
            color: #000; 
            text-decoration: none; 
        }
        .mainbox {
            border: black 1px solid;
            height: 60vh;
            width: 80%;
            margin-left: 10vw;
            margin-top: 10vh;
            border-radius: 5px;
            display: flex;
            flex-direction: column; 
            float: left;

            
        }

        .subtitle{
            margin-top:38px;
            padding-left: 30px;
            margin-bottom:20px;
        }

        .title{
            
            padding-left: 30px;
           
        }
        .upper{
            border-bottom: solid 1px black;
            height: 22%;
            width: 100%;
            padding-left:10px;
           

        }

  
       body {
            font-family: 'Poppins', sans-serif;
        }
 
        .left div {
            margin-bottom: 10px;
            width: 100%;
            
        }

        .modal-content {
            padding: 20px;
            style: hidden;
        }

        .nav-right a {
            color: #000;
            text-decoration: none;
        }
        
        .nav-left a:hover {
            color: #000;
        }
        
        .nav-left i {
            color: #000;
        }

        .info {
                width: 100%;
                height: 78%;
                display: flex;
                flex-direction: row;
            }

            .left, .right {
                box-sizing: border-box; /* Include padding and border in element's total width and height */
            }

            .left {
                width: 60%;
                border-right: solid 1px black;
                height: 100%;
                padding: 20px;
                display: flex;
                flex-direction: column;
     
            }

            .right {
                width: 40%;
                height: 100%;
                padding: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .left .info-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                margin-top: 10px;
                padding-top: 10px;
                padding-left: 20px;
            }

            .left .info-item strong {
                width: 150px;
                display: inline-block;
            }

            .left .info-item span {
                margin-left: 10px;
            }

            button {
                margin-top: 20px;
            }

            .pic {
                border-radius: 50%;
                overflow: hidden;
                width: 150px;
                height: 150px;
            }

            .profile-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
          
        /* General button styling */
        button {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            padding: 10px 20px;
            color: #fff;
            background-color: black; /* Bootstrap primary color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover effect */
        button:hover {
            background-color: white; /* Darker shade for hover effect */
            color:black;
            border: solid 1px black;
        }

        /* Focus effect */
        button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
          
        }

        .popup-content {
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

      

        .form-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            width: 20vw;
            border-radius: 10px;

        }

        .form-popup button{
            border-radius: 10px;
        }

        .form-container {
            text-align: left;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }

        .form-container button.cancel {
            background-color: #f44336;
        }

        .form-container label {
            justify: left;
        }

        a {
        color: inherit;
        text-decoration: none;
        cursor: pointer;
    }

    .right .pic {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    overflow: hidden;
    margin: auto; /* Center the circle horizontally */
    border: solid 2px black;
   
}

.profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensure the image covers the entire circle */
}


/* Styles for the pop-up form container */
.form-popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fefefe;
    border: 1px solid #ccc;
    padding: 20px;
    z-index: 1000; /* Ensure the pop-up is on top */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px; /* Adjust width */
    max-height: 80vh; /* Limit maximum height to 80% of viewport height */
    overflow-y: auto; /* Enable vertical scrolling if content exceeds max-height */
}
/* Styles for form elements inside the pop-up */
.form-popup input[type=text],
.form-popup input[type=email],
.form-popup input[type=date],
.form-popup input[type=file],
.form-popup button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.form-popup button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

.form-popup button:hover {
    opacity: 0.8;
}

.btn.cancel {
    background-color: #f44336;
}

.input-group {
    display: flex;
    justify-content: space-between;
}

.input-group > div {
    width: calc(50% - 10px); /* Adjust width as needed */
}

.input-group > div + div {
    margin-left: 20px; /* Adjust spacing between email and phone number fields */
}
    </style>
<body>
   
<?php include 'sidenav.php'; ?>

<div class="mainbox">
    <div class="upper">
        <div class="title"><br>
            <h1>My Profile</h1>
        </div>
        <div class="subtitle">
            <h3>Manage and Protect Your Account</h3>
        </div>
    </div>

    <div class="info">
        <div class="left">
            <div class="info-item">
                <strong>Name:</strong> <span id="name"><?php echo htmlspecialchars($name); ?></span>
            </div>
            <div class="info-item">
                <strong>Email:</strong> <span id="email"><?php echo htmlspecialchars($email); ?></span>
            </div>
            <div class="info-item">
                <strong>Phone Number:</strong> <span id="phone"><?php echo htmlspecialchars($contactNum); ?></span>
            </div>
            <div class="info-item">
                <strong>Gender:</strong> <span id="gender"><?php echo htmlspecialchars($address); ?></span>
            </div>
            <!-- Add other fields as needed -->
            <button onclick="openEditForm()">Edit</button>
        </div>
        
        <div class="right">
            <div class="pic">
                <img src="sample.jpg" alt="Profile Picture" class="profile-img">
            </div>
        </div>
    </div>
</div>

 
<div id="editForm" class="form-popup">
    <form action="updateInfo.php" method="POST" class="form-container">
        <h2>Edit Customer Information</h2>  

        <label for="name"><b>Name</b></label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" required>

        <div class="input-group">
            <div>
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
            </div>
            <div>
                <label for="contactNum"><b>Phone Number</b></label>
                <input type="text" name="contactNum" id="contactNum" value="<?php echo htmlspecialchars($contactNum); ?>" required>
            </div>
        </div>

        <label for="address"><b>Address</b></label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>" required>

        <button type="submit" class="fa-solid fa-pencil">Save Changes</button>
        <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
    </form>
</div>



<script>
    // Function to open the edit form
    function openEditForm() {
        // Assuming PHP variables are echoed into JavaScript for initialization
        var name = "<?php echo htmlspecialchars($name); ?>";
        var email = "<?php echo htmlspecialchars($email); ?>";
        var contactNum = "<?php echo htmlspecialchars($contactNum); ?>";
        var address = "<?php echo htmlspecialchars($address); ?>";

        // Populate form fields with current data
        document.getElementById("name").value = name;
        document.getElementById("email").value = email;
        document.getElementById("contactNum").value = contactNum;
        document.getElementById("address").value = address;

        // Show the edit form
        document.getElementById("editForm").style.display = "block";
    }

    // Function to close the edit form
    function closeEditForm() {
        // Hide the edit form
        document.getElementById("editForm").style.display = "none";
    }
</script>

   
    
</body>

</html>