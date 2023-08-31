<?php
    session_start();
    require 'db.php';

    // Check if form is submitted to update the inventory
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the form submission to update the inventory
        // Add your code here to update the inventory in the database
    }

    // Retrieve the inventory data from the database
    $sql = "SELECT * FROM inventory";
    $result = mysqli_query($conn, $sql);
    $inventory = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .container-column{
            width: 100%;
            background-color: #D9D9D9;
        }
        .container-table{

        }
    </style>
</head>
<body>
<?php require 'navBar_admin.html'; ?>
<br><center><h2>Inventory Management</h2></center><br>
<div class="container">
    <div class="container-column">
        <div class="container-table">
            <form method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($inventory as $item) : ?>
                        <tr>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Update Inventory</button>
            </form>
        </div>
    </div>
</div>
<script src="JS/scriptnav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
