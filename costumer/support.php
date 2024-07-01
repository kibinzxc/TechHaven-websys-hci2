
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
    border: 1px solid black;
}

.left {
    width: 40%;
    border: solid 1px black;
    height: 100%; 
    display: flex;
    align-items: center;
   padding-top: 15px;
    flex-direction: column;

}



.left-1 {
    width: 60%;
    border: solid 1px black;
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
    border: solid 1px black;
    margin-top: 40px;
    padding-left: 20px;
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
    width: 100px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-right: 10px;
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
          


        </div>  
     

    </div>

</body>

</html>