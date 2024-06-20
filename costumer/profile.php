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

        .upper{
            border-bottom: solid 1px black;
            height: 22%;
            width: 100%;
            padding-left:10px;
           

        }

       .right{
            border-right: solid 1px black;
            width: 40%;
            height: 100%;
            padding: 50px;

       }

       body {
            font-family: 'Poppins', sans-serif;
        }
        
        .left {
           
            width: 60%;
            border-right: solid 1px black;
            height: 100%;
            padding: 20px;
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

        .info{
            width: 100%;
            height: 78%;
            display: flex;
            flex-direction: row;
        }
        /* General button styling */
        button {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff; /* Bootstrap primary color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
    </style>
<body>
   
<?php include 'sidenav.php'; ?>

   <div class="mainbox">

        <div class="upper">
            <div class="title">
                <h1> My Profile</h1>
             </div>
             <div class="subtitle">
                <h3> Manage and Protect Your account</h3>
             </div>
        </div>

        <div class="info">
            <div class="left">
            <div><strong>Name:</strong> <span id="name">John Doe</span></div>
                <div><strong>Email:</strong> <span id="email">john.doe@example.com</span></div>
                <div><strong>Phone Number:</strong> <span id="phone">123-456-7890</span></div>
                <div><strong>Gender:</strong> <span id="gender">Male</span></div>
                <button onclick="openEditModal()">Edit</button>
            

            </div>
            <div class="right">
    <div class="pic">
    <img src="sample.jpg" alt="Profile Picture" class="profile-img">
    </div>
</div>

        </div>
   </div>

 
   
    <!-- Edit Modal -->
    <div id="editForm" class="form-popup">
            <form action="admin-manage-resolution.php" method="POST" class="form-container" enctype="multipart/form-data">
                <h2>Edit Resolution</h2>  

                <label for="title"><b>Title</b></label>
                <input type="text" name="title" placeholder="Enter Title" id="title" required>

                <label for="dateCreated"><b>Date Created</b></label>
                <input type="date" name="dateCreated" id="dateCreated" required>

                <label for="dateImplemented"><b>Date Implemented</b></label>
                <input type="date" name="dateImplemented" id="dateImplemented" required>

                <label for="officialCopy"><b>Official Copy</b></label>
                <input type="file" name="officialCopy" id="officialCopy" accept=".pdf, .doc, .docx">

                <!-- Add an additional field for identifying the resolution being edited -->
                <input type="hidden" name="editResolutionID" id="editResolutionID">

                <button type="submit" name="editResolution" class="fa-solid fa-pencil">Save Changes</button>
                <button type="button" class="btn cancel" onclick="closeEditForm()">Cancel</button>
            </form>
        </div>


        <script>
             // Function to open the edit form
             function openEditForm(resolutionID) {
                // Assuming $resolutions is a PHP array containing resolution details
                var resolutions = <?php echo json_encode($resolutions); ?>;
                var resolution = resolutions.find(function (r) {
                    return r.resolutionID == resolutionID;
                });

                if (resolution) {
                    document.getElementById("title").value = resolution.title;
                    document.getElementById("dateCreated").value = resolution.dateCreated;
                    document.getElementById("dateImplemented").value = resolution.dateImplemented;

                    // Set the resolution ID value in the hidden field
                    document.getElementById("editResolutionID").value = resolution.resolutionID;

                    // Show the edit form
                    document.getElementById("editForm").style.display = "block";
                } else {
                    console.log("Resolution not found for ID: " + resolutionID);
                }
            }

            // Function to close the edit form
            function closeEditForm() {
                // Hide the edit form
                document.getElementById("editForm").style.display = "none";
            }

</script>
   
    
</body>

</html>