
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

    <link rel="short icon" href="../costumer/logo.jpg" type="x-icon">
    <title>
        <?php echo "Orderlist"; ?>
    </title>
    <link rel="stylesheet" href="../costumer/css/users.css">
    <link rel="stylesheet" href="../costumer/css/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
   
</head>

<style>
    *{
    
            font-family: 'Poppins', sans-serif;
            

    }
  .mainbox {
            height: 80vh;
            width: 90vw;
            margin: auto;
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            padding-left: 120px;
            justify-content: center;
        }

    .tab{
        height: 15%;
        width: 80%;
        margin-left: 50px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: auto;
        align-items: center;
        padding-left: 15px;
        padding-right: 15px;


    }



        .all {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 17%;
            transition: background-color 0.3s, color 0.3s;
            cursor: pointer; 
        }

        .all.active {
            border-bottom: 3px solid #046f6f;
        }


        .list {
                height: 85%;
                width: 80%;
         
                margin-left: 50px;
                display: flex;
                flex-direction: column;
                border-top: none;
                padding: auto;
                align-items: center;
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 30px;
        }


        .product{
                height: 40%;
                width: 90%;
                border: solid 1px black;
                margin-bottom:10px;
                border-radius: 5px;
                display flex: column;
                font-size:12px;
                display: none;
        }

     

        .product.active {
    display: block; /* Show active product */
}



        .upper{
            height:15%;
            width: 100%;
            border-bottom: 1px solid black;
            display: flex;
            flex-direction: row;
            justify-content: center; 
        }


        .id{
            height: 100%;
            width: 20%;
           
            justify-content: center; 
            padding-top: 3px;
            padding-left: 6px;
        }

        .date{
            height: 100%;
            width: 65%;
            justify-content: center; 
            padding-top: 3px;
            padding-left: 6px;
        }

        .status{
            height: 100%;
            width: 15%;
            justify-content: center; 
            color: #046f6f;
            padding-top: 3px;
            padding-left: 25px;
            font-weight: bold;
        }




        .middle{
            height:70%;
            width: 100%;
            border-bottom: 1px solid black;
            display: flex;
            flex-direction: row;
        }

        .image{
            height: 100%;
            width: 20%;
            
            justify-content: center; 
            padding-top: 3px;
            padding-left: 6px;
        }


        .image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; /* Ensures the image maintains its aspect ratio */
        }

        .order-info{
            height: 100%;
            width: 65%;
        
            justify-content: center; 
            padding-top: 10px;
            padding-left: 15px;
        }

        .price{
            height: 100%;
            width: 15%;
            justify-content: center; 
           
            padding-top: 3px;
            padding-left: 6px;
            display: flex;
            justify-content: center; /* Center items vertically */
            align-items: center; /* Center items horizontally */
        }




        .bottom{
            height:15%;
            width: 100%;
            display: flex;
            justify-content: right;
            padding-right:20px; 
            color: #046f6f;
        }

</style>


<body>
<?php include 'sidenav.php'; ?>

    <div class="mainbox">
    <div class="tab">
        <div class="all" data-tab="all">All</div>
        <div class="all" data-tab="to-pay">To Pay</div>
        <div class="all" data-tab="to-ship">To Ship</div>
        <div class="all" data-tab="to-receive">To Receive</div>
        <div class="all" data-tab="completed">Completed</div>
        <div class="all" data-tab="cancelled">Cancelled</div>
    </div>

     
    <div class="list">
        <div class="product" data-tab-content="all" >
            <!-- Content for All tab -->
            <div class="upper">
                <div class="id">ORDER 1021554</div>
                <div class="date">MAR 21, 2024</div>
                <div class="status">COMPLETED</div>
            </div>

            <div class="middle">
                <div class="image">
                    <img src="item.png" alt="Product Image">
                </div>

                <div class="order-info">
                    <div class="info-item"><h2>Rakk Aporo RGB Gaming Mouse</h2> </div>
                    <div class="info-item">Category: Mouse</div>
                    <div class="info-item" style="margin-top:20px;">x1</div>
                </div>

                <div class="price">P350</div>
            </div>

            <div class="bottom">
                <h3>Total: P350</h3>
            </div>
        </div>

         <!-- Content for TO PAY tab------------------------------------------------------------------------------- -->
        <div class="product" data-tab-content="to-pay" >

            <div class="upper">
                <div class="id">ORDER 1021554</div>
                <div class="date">MAR 21, 2024</div>
                <div class="status">COMPLETED</div>
            </div>

            <div class="middle">
                <div class="image">
                    <img src="item.png" alt="Product Image">
                </div>

                <div class="order-info">
                    <div class="info-item"><h2>Rakk Aporo RGB Gaming Mouse</h2> </div>
                    <div class="info-item">Category: Mouse</div>
                    <div class="info-item" style="margin-top:20px;">x1</div>
                </div>

                <div class="price">P350</div>
            </div>

            <div class="bottom">
                <h3>Total: P350</h3>
            </div>
        
        </div>


        <!-- Content for TO SHIP tab ------------------------------------------------------------------------------------------->

        <div class="product" data-tab-content="to-ship">
            
            <div class="upper">
                <div class="id">ORDER 1021554</div>
                <div class="date">MAR 21, 2024</div>
                <div class="status">COMPLETED</div>
            </div>

            <div class="middle">
                <div class="image">
                    <img src="item.png" alt="Product Image">
                </div>

                <div class="order-info">
                    <div class="info-item"><h2>Rakk Aporo RGB Gaming Mouse</h2> </div>
                    <div class="info-item">Category: Mouse</div>
                    <div class="info-item" style="margin-top:20px;">x1</div>
                </div>

                <div class="price">P350</div>
            </div>

            <div class="bottom">
                <h3>Total: P350</h3>
            </div>

        </div>

          <!-- Content for TO RECEIVE tab ------------------------------------------------------------------------------------------->
        <div class="product" data-tab-content="to-receive">
            <div class="upper">
                <div class="id">ORDER 1021554</div>
                <div class="date">MAR 21, 2024</div>
                <div class="status">COMPLETED</div>
            </div>

            <div class="middle">
                <div class="image">
                    <img src="item.png" alt="Product Image">
                </div>

                <div class="order-info">
                    <div class="info-item"><h2>Rakk Aporo RGB Gaming Mouse</h2> </div>
                    <div class="info-item">Category: Mouse</div>
                    <div class="info-item" style="margin-top:20px;">x1</div>
                </div>

                <div class="price">P350</div>
            </div>

            <div class="bottom">
                <h3>Total: P350</h3>
            </div>
        </div>

<!-- Content for COMPLETED tab ------------------------------------------------------------------------------------------->
        <div class="product" data-tab-content="completed">
        <div class="upper">
                <div class="id">ORDER 1021554</div>
                <div class="date">MAR 21, 2024</div>
                <div class="status">COMPLETED</div>
            </div>

            <div class="middle">
                <div class="image">
                    <img src="item.png" alt="Product Image">
                </div>

                <div class="order-info">
                    <div class="info-item"><h2>Rakk Aporo RGB Gaming Mouse</h2> </div>
                    <div class="info-item">Category: Mouse</div>
                    <div class="info-item" style="margin-top:20px;">x1</div>
                </div>

                <div class="price">P350</div>
            </div>

            <div class="bottom">
                <h3>Total: P350</h3>
            </div>
        </div>

        <!-- Content for CANCELLED tab ------------------------------------------------------------------------------------------->


        <div class="product" data-tab-content="cancelled">
        <div class="upper">
                <div class="id">ORDER 1021554</div>
                <div class="date">MAR 21, 2024</div>
                <div class="status">COMPLETED</div>
            </div>

            <div class="middle">
                <div class="image">
                    <img src="item.png" alt="Product Image">
                </div>

                <div class="order-info">
                    <div class="info-item"><h2>Rakk Aporo RGB Gaming Mouse</h2> </div>
                    <div class="info-item">Category: Mouse</div>
                    <div class="info-item" style="margin-top:20px;">x1</div>
                </div>

                <div class="price">P350</div>
            </div>

            <div class="bottom">
                <h3>Total: P350</h3>
            </div>
        </div>
    </div>
</div>

    </div>

    <script>
        const toggle = document.getElementById('dark-mode-toggle');
        const logo = document.getElementById('logo');

        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.classList.add('rotate');
            if (document.body.classList.contains('dark-mode')) {
                toggle.classList.remove('bi-moon-fill');
                toggle.classList.add('bi-sun-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            } else {
                toggle.classList.remove('bi-sun-fill');
                toggle.classList.add('bi-moon-fill');
                logo.src = '../costumer/tech-haven-logo2.png';
            }
            setTimeout(() => {
                toggle.classList.remove('rotate');
            }, 400);
        });
        
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab .all');
    const contents = document.querySelectorAll('.list .product');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const target = this.getAttribute('data-tab');

            // Remove active class from all tabs and hide all contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            // Add active class to the clicked tab and show the corresponding content
            this.classList.add('active');
            document.querySelector(`.product[data-tab-content="${target}"]`).classList.add('active');
        });
    });

    // Set the first tab as active by default
    tabs[0].classList.add('active');
    contents[0].classList.add('active');
});
    </script>
</body>

</html>