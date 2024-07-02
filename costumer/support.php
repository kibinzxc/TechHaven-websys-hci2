
<?php
session_start();
include 'dbcon.php';
$customerID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href=".../costumer/css/font.css">
   
</head>
<style>
    *{
    
    font-family: 'Poppins', sans-serif;
    

    }
    .mainbox {
    height: 80vh;
    width: 70vw;
    margin: auto;
    margin-top: 30px;
    display: flex;
    flex-direction: row;
 
    }

.left {
    width: 40%;
   
    height: 100%; 
    display: flex;
    align-items: center;
    padding-top: 15px;
    flex-direction: column;

}



.left-1 {
    width: 60%;
    margin-top: 10px;
    height: 100%; 

}

.details{
    width: 90%;
    height: 20%; 
    font-family: 'Poppins', sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
   

}

.phone{
    width: 90%;
    border: solid 1px black;
    height: 10%; 
    border-radius: 10px;
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; 
    margin:5px;

}

.phone i {
    margin-right:10px;
}

.form{
    display: flex;
    flex-direction: row;

    margin-top: 30px;
    padding-left: 20px;
    justify-content: center;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
  
}

.form-group-1 input[type="text"] {
    width: 250px;
    padding: 8px;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    margin-right: 10px;
}

.form-group-2 input[type="text"] {
    width: 510px;
    padding: 8px;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    margin-right: 10px;
}


.form-group-3 input[type="text"] {
    height: 100px;
    width: 510px;
    padding: 8px;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
    margin-right: 10px;
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
            width: 510px;
        }

        /* Hover effect */
        button:hover {
            background-color: #0056b3; /* Darker shade for hover effect */
        }

        /* Focus effect */
        button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }
</style>
<body>
   
<?php include 'sidenav.php'; ?>


    <div class="mainbox">

        <div class="left">
            <div class="details">
                <h1> Contact Us </h1>
                <h5> Have Any Questions? We would be happy to assist you </h5>
            </div>

            <div class="phone">
                <i class="bi bi-telephone"></i> 0956 879 8546 
            </div>

            <div class="phone">
                <i class="bi bi-envelope"></i> techhaven.support@gmail.com
            </div>

            <div class="phone">
            <i class="bi bi-geo-alt-fill"></i>Imus City, Cavite, PH
            </div>






        </div>

        <div class="left-1">
       
            <form class="form">

                <div class="form-group-1">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>
                <div class="form-group-1">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last-name" required>
                </div>

            </form>
              
            <form class="form">

                <div class="form-group-2">
                    <label for="first-name">Email:</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>

            </form>

            <form class="form">

                <div class="form-group-2">
                    <label for="first-name">Phone:</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>

            </form>
            
            <form class="form">

                <div class="form-group-3">
                    <label for="first-name">Message:</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>

            </form>

                
            <form class="form">

            <button >Submit</button>

            </form>
             

        </div>  


     

    </div>

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
                logo.src = 'logo_dark.png';
            } else {
                toggle.classList.remove('bi-sun-fill');
                toggle.classList.add('bi-moon-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            }
            setTimeout(() => {
                toggle.classList.remove('rotate');
            }, 400);
        });
</script>
</html>