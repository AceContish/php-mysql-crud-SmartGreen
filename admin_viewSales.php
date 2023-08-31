<?php
    session_start();
    require 'db.php';

    // Calculate Total Sales
    $totalSalesQuery = "SELECT SUM(total_payment) AS total_sales FROM payment";
    $totalSalesResult = mysqli_query($conn, $totalSalesQuery);
    $totalSalesRow = mysqli_fetch_assoc($totalSalesResult);
    $totalSales = $totalSalesRow['total_sales'];

    // Calculate Total Items Sold
    $totalItemsQuery = "SELECT COUNT(*) AS total_items_sold FROM `order`";
    $totalItemsResult = mysqli_query($conn, $totalItemsQuery);
    $totalItemsRow = mysqli_fetch_assoc($totalItemsResult);
    $totalItemsSold = $totalItemsRow['total_items_sold'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .custom-column {
		width: 100%;
		height: 300px;
		background: #B4B4CD;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-right: 60px;
        margin-left: 60px;
	}
    .row.g-4 {
        padding-left: 100px;
        padding-right: 100px;
    }

    #backBtn2{
        color: #FFF;
        text-align: center;
        font-family: Inter;
        font-size: 26.802px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 189px;
        height: 65px;
        flex-shrink: 0;
        border-radius: 40px;
        background: #0D6EFD;
    }
    </style>
</head>
<body>
<?php require 'navBar_admin.html'; ?>
<br><center><h2>Sales Transaction</h2></center><br><br>
<div class="row g-4">
    <div class="col custom-column" style="background: #3D9DF3 !important;">
        <div class="d-flex flex-column align-items-center">
            <img style="height: 188px; width: 178px;" src="Image/transaction.png" alt="edit_user.png">
            <p style="font-size: 26.802px;" class="mt-3">Total Sales</p>
        </div>
    </div>
    <div class="col custom-column">
        <div class="d-flex flex-column align-items-center">
            <img style="height: 188px; width: 178px;" src="Image/sold-out.png" alt="sales_transaction.png">
            <p style="font-size: 26.802px;" class="mt-3">Total Items Sold</p>
        </div>
    </div>
</div><br>
<div class="row g-4">
    <div class="col custom-column" style="height: 30px; background:none">
        <div class="d-flex flex-column align-items-center">
            <p style="font-size: 32px; font-style:normal; font-weight: bold;" class="mt-3">RM <?php echo $totalSales; ?></p>
        </div>
    </div>
    <div class="col custom-column" style="height: 30px; background:none">
        <div class="d-flex flex-column align-items-center">
            <p style="font-size: 32px; font-style:normal; font-weight: bold;" class="mt-3"><?php echo $totalItemsSold; ?> Items</p>
        </div>
    </div>
</div><br>
<div style="padding: 30px">
    <center><button id="backBtn2" onclick="backbtn2()">Back</button></center>
    <script>
        //back button for every admin back button
        const backbtn2 = ()=> {
            window.location.href = 'admin_dashboard.php';
        };
    </script>
</div>
<script src="JS/scriptnav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
