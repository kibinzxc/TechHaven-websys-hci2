<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "Checkout"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head><style>
    .mainbox{
        border: solid 3px black;
        height: 80vh;
        width: 60%;
        margin: auto;
        margin-top: 20px;
        display: flex; /* Set display to flex */
        flex-direction: column; /* Set direction to row for side-by-side layout */
        border-radius: 10px;
    }

    .left{
        border: solid 1px black;
        height: 100%; /* Set height to 100% to fill the parent */
        width: 60%;
        display: flex;
        flex-direction: column;
        border-left: none;
        border-right: none;
    }

    .top-tab{
   
   
        padding-top: 40px;
        padding-left:100px;
    }

    .content{
   
    }


    body {
    font-family: Arial, sans-serif;
    }

.content {
    width: 70%;
    margin: auto;
    padding: 20px;
    margin-top: 10px;
    border-radius: 5px;
}

.row1, .row2, .row3 {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

.row1 input, .row2 input, .row3 input {
    flex: 1;
    padding: 10px;
    border: 1px solid black;
    border-radius: 5px;
    background-color:
}

.row1 input {
    width: 50%;
}

.row2 input {
    width: 100%;
}

.row3 input {
    width: 33.33%;
}

button {
    padding: 10px 20px;
    border: none;
    background-color: #000;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

button:hover {
    background-color: #444;
}



          .right {
           border: solid 3px black;
            height: 80%;
            width:370px;
            margin-left: 5px;
            position: fixed;
            margin-right: 216px;
            margin-top:4px;
            display: flex;
            flex-direction: column;
            background-color: #d3d3d3;
            
            border-radius: 10px;
        
     
        }

        .title{
            height: 30px;
            width: 100%;
           
            color: black;
            padding:10px;
        }

        .product{
            display: flex;
            flex-direction: row;
            height: 100px;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
            
            
        }

        .img {

    height: 100%;
    width: 45%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.profile-img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

        .description{
            width:100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .upper{
            height: 80%;
            color: black;
            padding-left: 10px;
            padding-top: 10px;
         
        }

        .lower{
            height: 20%;
            color: black;
         
            display: flex;
            flex-direction: row;
            padding-left: 10px;
           

         
        }

        .quantity{
            height: 100%;
            width: 40%;
            color: black;
        }

        .price{
            height: 100%;
            width: 60%;
            color: black;
            padding-left: 50px;
            padding-top: 10px;  
           
        }


        .payment{
            color: black;
            margin-top:30px;
            border-top:solid 1px black;
            border-bottom:solid 1px black;
            padding: 10px;
            width: 100%;
        }
       

        .total{
            width:100%;
            display: flex;
            flex-direction: row;
            margin-bottom: 250px;
        }
</style>
<body>

<?php include 'sidenav.php'; ?>
    
<div class="mainbox">

        <div class="left">
            <div class="top-tab">

                <h2>Information</h2>

            </div>

                    
            <div class="content">

            <div class="row1">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Surname">
            </div>

            <div class="row2">
                <input type="text" placeholder="Phone Number">
            </div>

            <div class="row2">
                <input type="text" placeholder="Email Address">
            </div>

            <div class="row2">
                <input type="text" placeholder="Complete Address">
            </div>

            <div class="row3">
                <input type="text" placeholder="Street">
                <input type="text" placeholder="City">
                <input type="text" placeholder="Town">
            </div>

            <div class="row1">
                <input type="text" placeholder="Postal Code">
                <input type="text" placeholder="Region">
            </div>

            <div class="row2">
                <input type="text" placeholder="Delivery Instructions (optional)">
            </div>

            <a href="checkoutShipping.php">
                <button type="button">Continue to delivery</button>
            </a>
            </div>

            <div class="right">

                <div class="title">
                    <h2> Order Summary </h2>
                </div>
                <div class="product">
                    <div class="img">
                        <img src="item.png" alt="Profile Picture" class="profile-img">
                    </div>
                    <div class="description">

                        <div class="upper">
                            <p> Rakk Alkus RGB Gaming Mouse</p>
                        </div>

                        <div class="lower">
                            <div class="quantity">
                                x1
                            </div>
                            <div class="price">
                                Php 989
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="payment">
                    <p>Subtotal</p> 
                    <br>
                    <p>Shipping</p> 
                </div>
                <div class="total">
                    <div class="title">
                        <b> Total </b>
                    </div>

                    <div class="price">
                    Php 989
                    </div>
                </div>

            </div>






      
        </div>
        
     

</div>


</body>
</html>