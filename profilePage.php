<?php
  session_start();  
  require 'db.php';

  $userid = $_SESSION['userid'];
  // SQL query to retrieve data

  $query = "SELECT * FROM userapp WHERE user_id = '$userid'";
        // Execute the query
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$name = $row['username'];
$email = $row['email'];
$phone = $row['phone_number'];
$unique = $row['unique_key'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .custom-column1{
            width: 100%;
            height: 238px;
            background-color: #D9D9D9;
            border-radius: 45px;
        }
        .custom-column2{
            width: 100%;
            height: 238px;
            background-color: #D9D9D9;
            position: relative;
        }
        .column2-child{
            margin-left: 35px;
            padding-top: 25px;
            position: relative;
        }
        .btn-primary {
            width: 99px;
            position: absolute;
            bottom: 0;
            right: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
  <?php
    require 'navBar_user.html'
  ?>
  <br>
   <div class="container">
        <h2>My Profile</h2>
        <div class="custom-column1">
           <div class="column1-child">
              
           </div>
        <!-- </div><br><br> -->
        <div class="custom-column2">
            <div class="column2-child">
                <h5>Details</h5>
                <p>Name: <?php echo $name?></p>
                <p>Email: <?php echo $email ?></p>
                <p>Phone: <?php echo $phone?></p>
                <p>Unique Code: <?php echo $unique?></p>
                <button type="button" id="backBtn" class="btn btn-primary">Back</button>
            </div>
        </div>
   </div>
    
<script src="JS/scriptnav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>