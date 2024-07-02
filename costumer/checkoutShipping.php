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
        padding-left: 45px;

    }

    .content{
   
    }


    body {
    font-family: Arial, sans-serif;
    }

.content {
    width: 90%;
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

        .shipping{
            height: 70px;
            width: 100%;
            border: solid 1px black;
            border-radius: 5px;
            display: flex;
            flex-direction:column;
            background-color: #d3d3d3;

        }

        .contact{
            display: flex;
            flex-direction:row;
            height: 50%;
            width: 90%;
            border-bottom: solid 1px black;
            padding-top: 5px;

        }

        .add{
            display: flex;
            flex-direction:row;
            height: 50%;
            width: 90%;
            padding-top: 5px
            
            
        }



        .label{
            margin-right: 15px;
        }

        .info{
            margin-right: 58px;
        }
        .info1{
            margin-right: 95px;
        }

        .method{
            height: 40px;
            width: 100%;
            border: solid 1px black;
            border-radius: 5px;
            display: flex;
            flex-direction:row;
            background-color: #d3d3d3;

        }

        .title1 {
            display: flex;
            flex-direction: row;
            width: 200px;
            padding: 10px;
        }

        .method p {
            margin-left: 10px;
        }
        
        .price1{
            padding: 10px;
            margin-left: 150px;
        }
</style>

<body>

<?php include 'sidenav.php'; ?>
    
<div class="mainbox">

        <div class="left">
            <div class="top-tab">

                <h2>Shipping </h2>

            </div>

                    
            <div class="content">
             
                <div class="shipping">
                   
                <div class="contact">
                        <div class="label">
                        Contact:
                        </div>
                        <div class="info1">
                        Markanthony@gmail.com
                        </div>
                        <div class="modify">
                        change
                        </div>
                </div>

                   
                <div class="add">
                    <div class="label">
                            Ship To:
                        </div>
                        <div class="info">
                            Brgy. Buhay na Tubig Imus City
                        </div>
                        <div class="modify">
                            change
                        </div>
                            
                    </div>
                </div>


                    <div class="method">

                        <div class="title1">
                            <i class="bi bi-crosshair2"></i>
                            <p> Standard - Luzon </p>
                        </div>

                        <div class="price1">
                        <p> <b> Php 698 </b> </p>
                        </div>

                    </div>
            

          

            <a href="checkoutInfo.php" style="margin-right:195px;">
                <button type="button">Go back   </button>
            </a>
            
            <a href="checkoutPayment.php">
                <button type="button">Continue to Payment</button>
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