<?php
    session_start();
    require 'db.php';

    // Check if form is submitted to update the inventory
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the updated data from the form
        $id = $_POST['id'];
        $productName = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        // Update the inventory in the database
        $sql = "UPDATE inventory SET name = '$productName', quantity = '$quantity', price = '$price' WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        // Redirect back to the inventory page after updating
        header('Location: admin_viewInventory.php');
        exit();
    }

    // Check if the ID parameter is passed in the URL
    if (!isset($_GET['id'])) {
        header('Location:admin_viewInventory.php');
        exit();
    }

    // Get the inventory item based on the ID from the URL parameter
    $id = $_GET['id'];
    $sql = "SELECT * FROM inventory WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $inventoryItem = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php require 'navBar_admin.html'; ?>
    <div class="container">
        <h2>Edit Inventory Item</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $inventoryItem['id']; ?>">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $inventoryItem['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $inventoryItem['quantity']; ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $inventoryItem['price']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
