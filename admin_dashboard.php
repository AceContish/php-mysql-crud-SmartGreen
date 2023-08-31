<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .custom-column {
		width: 400px;
		height: 300px;
		background-color: #D9D9D9;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-right: 60px;
	}
	.custom-column:last-child {
		margin-right: 0;
	}
    .img-height {
		height: 450px;
		object-fit: contain;
	}
    </style>
</head>
<body>
<?php
    require 'navBar_admin.html';
?>
<br><center><h2>Dashboard</h2></center><br>
<div class="container">
    <div class="container">
        <div class="container text-center">
		<div class="row g-4">
			<div class="col custom-column" onclick="redirectEditUser()">
				<div class="d-flex flex-column align-items-center">
					<img style="height: 188px; width: 178px;" src="Image/edit.png" alt="edit_user.png">
					<p style="font-size: 26.802px;" class="mt-3">Edit User</p>
				</div>
			</div>
			<div class="col custom-column" onclick="redirectSales()">
				<div class="d-flex flex-column align-items-center">
					<img style="height: 188px; width: 178px;" src="Image/transaction.png" alt="sales_transaction.png">
					<p style="font-size: 26.802px;" class="mt-3">Sales Transaction</p>
				</div>
			</div>
		</div><br>
        </div><br>
        <div class="container text-center">
                <div class="row g-4">
                    <div class="col custom-column" onclick="redirectCreateRecipe()">
                        <div class="d-flex flex-column align-items-center">
                            <img style="height: 188px; width: 178px;" src="Image/recipe-book.png" alt="create_recipe.png">
                            <p style="font-size: 26.802px;" class="mt-3">Create Recipe</p>
                        </div>
                    </div>
                    <div class="col custom-column" onclick="redirectInventory()">
                        <div class="d-flex flex-column align-items-center">
                            <img style="height: 188px; width: 178px;" src="Image/inventory.png" alt="inventory_management.png">
                            <p style="font-size: 26.802px;" class="mt-3">Inventory Management</p>
                        </div>
                    </div>
                </div><br>
        </div><br>
    </div>
</div>
<script src="JS/scriptnav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>