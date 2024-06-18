<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="../portal/logo.jpg" type="x-icon">
    <title><?php echo "Login to Tech Haven"; ?></title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../portal/font.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <style>
        /* Hide the default browser tooltip */
        .tooltip-text {
            position: absolute;
            display: none;
            background-color: #5C5C5C;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            font-size: 10px;
            white-space: nowrap;
            z-index: 999;
            font-family:'Inter';
        }

        .active-icon {
            color: green !important;
        }
         .dashboard-content {
        width: 100%; 
        padding: 20px;
    }
    #example {
        width: 100% !important; 
        margin: auto;
    }
    #example th, #example td {
        text-align: center; 
    }
    </style>
</head>
<body>
    <header class="nav">
        <div class="nav-left">
             <img src="../assets/img/tech-haven-logo2.png" alt="Tech Haven Logo" id="logo">
        </div>
        <div class="nav-right">
            <i class="bi bi-bell-fill tooltip-trigger" data-tooltip="Notifications"></i>
            <i class="bi bi-person-circle tooltip-trigger" data-tooltip="Profile"></i>
        </div>
    </header>
    <section class="container">
        <div class="sidebar">
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                <a href="dashboard.php" class="sidebar-link tooltip-trigger" data-tooltip="Dashboard">
                          <i class="bi bi-bar-chart-line-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="orders.php" class="sidebar-link tooltip-trigger active" data-tooltip="Orders">
                          <i class="bi bi-clipboard2-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="products.php" class="sidebar-link tooltip-trigger" data-tooltip="Products">
                          <i class="bi bi-box-seam-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="inventory.php" class="sidebar-link tooltip-trigger" data-tooltip="Inventory">
                          <i class="bi bi-inboxes-fill"></i>
                        </a>    
                </li>
                <li class="sidebar-list-item">
                     <a href="feedbacks.php" class="sidebar-link tooltip-trigger" data-tooltip="Feedbacks">
                         <i class="bi bi-chat-square-dots-fill"></i>
                     </a>
                </li>   
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Advertisements">
                         <i class="bi bi-envelope-plus-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Users">
                         <i class="bi bi-people-fill"></i>
                     </a>
                </li>
                <hr>
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Notifications">
                         <i class="bi bi-bell-fill"></i>
                     </a>
                </li>
                <li class="sidebar-list-item">
                     <a href="users.php" class="sidebar-link tooltip-trigger" data-tooltip="Edit Profile">
                         <i class="bi bi-person-fill-gear"></i>
                     </a>
                </li>
              </ul>
          </div>
    </aside>
    <div class="tooltip-text"></div>
    <div class="dashboard-content">
        <h1>All Orders Data</h1><br>
       <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
        <tr>
            <td>Garrett Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009/01/12</td>
            <td>$86,000</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
    </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggers = document.querySelectorAll('.tooltip-trigger');
            var tooltipText = document.querySelector('.tooltip-text');

            tooltipTriggers.forEach(function(trigger) {
                trigger.addEventListener('mouseover', function(event) {
                    var tooltipContent = this.getAttribute('data-tooltip');
                    tooltipText.textContent = tooltipContent;
                    tooltipText.style.display = 'block';
                    tooltipText.style.top = (event.clientY + window.scrollY + 10) + 'px';
                    tooltipText.style.left = (event.clientX + window.scrollX + 10) + 'px';
                });

                trigger.addEventListener('mouseout', function() {
                    tooltipText.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>
