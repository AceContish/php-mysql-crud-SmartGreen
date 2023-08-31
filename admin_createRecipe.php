<?php
    session_start();
    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recipeName = $_POST['recipe_name'];
        $recipeDesc = $_POST['recipe_desc'];

        // Insert the recipe into the database
        $sql = "INSERT INTO recipe (recipe_name, recipe_desc) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $recipeName, $recipeDesc);
        $stmt->execute();

        // Display an alert message
        echo '<script>alert("Recipe is added into the database.");</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .container-child{
            background: #D9D9D9;
            width: 100%;
        }

        div input[type="submit"] {
            background: #21C354;
            color: white;
            padding: 0.375rem 0.75rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        div input[type="reset"] {
            background: #6D6D73;
            color: white;
            padding: 0.375rem 0.75rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .child-content form{
            text-align: center;
        }
    </style>
</head>
<body>
<?php require 'navBar_admin.html'; ?>
<br><center><h2>Create Recipe</h2></center><br>
<div class="container">
    <div class="container-child">
        <div class="child-content"><br><br>
        <form action="admin_createRecipe.php" method="post">
            <label for="recipe_name">Recipe Name</label><br>
            <input style="width: 459px" type="text" placeholder="Enter Recipe Name" name="recipe_name"><br><br>
            <label for="recipe_desc">Recipe Name</label><br>
            <input style="width: 459px" type="text" placeholder="Enter Recipe Details" name="recipe_desc"><br>
            <br><br>
            <div>
                <input type="submit" value="Create">
                <input type="reset" value="Reset">
   
            </div>
        </form><br><br>
        </div>
    </div>
</div>
<script src="JS/scriptnav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>