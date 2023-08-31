<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .item-column {
            width: 100%;
            height: 85px;
            background-color: #D9D9D9;
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 35px;
        }
        
        .item-child {
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: space-between;
        }
        
        .item-child p:first-child {
            margin-right: auto;
            margin-left: 0;
        }
    </style>
</head>
<body>
   <?php 
        require 'navBar_user.html';
        require 'db.php';
        session_start();
   ?>
    <br><br>
    <div class="container">
        <h3>My Cart</h3><br><br>
        <?php
        // Replace USER_ID with the actual user ID value
        $user_id = $_SESSION['userid'];
    
        // Fetch order items and prices for the user from the database
        $query = "SELECT order_item, item_price FROM `order` WHERE user_id = $user_id";
        $result = $conn->query($query);
    
        // Check if there are any results
        if ($result->num_rows > 0) {
            $total_price = 0;
    
            // Display order items and prices
            while ($row = $result->fetch_assoc()) {
                $item = $row['order_item'];
                $price = $row['item_price'];
                $total_price += $price;
    
                echo '<div class="item-column">';
                echo '<div class="item-child">';
                echo '<p>'.$item.'</p>';
                echo '<p style="margin-left: auto;">RM '.$price.'</p>';
                echo '</div>';
                echo '</div><br>';
            }
    
            // Display total price
            echo '<div class="item-column-2">';
            echo '<p>Total: RM '.$total_price.'.00</p>';
            echo '</div>';
        } else {
            echo 'No items found for this user.';
        }
    
        // Close the database connection
        $conn->close();
        ?>
        <br>
        <div>
          <button type="button" id="backBtn" class="btn btn-primary">Back</button>
          <button type="button" id="backBtn" class="btn btn-danger">Pay</button>
        </div>
    </div>
    <script src="JS/scriptnav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
