<?php
require 'navBar_user.html';
require 'db.php';
session_start();

// Retrieve the user's order items
$user_id = $_SESSION['userid']; // Set the user ID here
$query = "SELECT order_item FROM `order` WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$orderedItems = array();
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orderedItems[] = $row['order_item'];
    }
}

// Retrieve the recommended recipes based on ordered items
$recommendedRecipes = array();
foreach ($orderedItems as $item) {
    $query = "SELECT recipe_name, recipe_desc FROM `recipe` WHERE recipe_desc LIKE '%$item%'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $recommendedRecipes[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes Recommendation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        
        .container-child {
            background-color: #6DA9E4;
            width: 100%;
            margin-bottom: 20px;
        }

        .inner-child {
            padding: 35px;
        }

        .custom-table {
            font-family: Inter;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .custom-table tbody td {
            color: #000;
        }

        .space-one {
            margin-left: 50px;
        }

        td.space-one {
        vertical-align: top;
    }
    </style>
</head>

<body>
    <br><br>
    <div class="container">
        <h2>Recipes Recommendation</h2>
        <?php if (!empty($recommendedRecipes)) { ?>
            <?php foreach ($recommendedRecipes as $recipe) { ?>
                <div class="container-child">
                    <div class="inner-child">
                        <table class="custom-table">
                            <tbody>
                                <tr>
                                    <td class="space-image">
                                        <img style="width: 200px; height:200px "
                                            src="Image/<?php echo $recipe['recipe_name']; ?>.jpg"
                                            alt="image-<?php echo $recipe['recipe_name']; ?>">
                                    </td>
                                    <td class="space-one">
                                        <?php echo $recipe['recipe_name']; ?>
                                    </td>
                                    <td class="space-two">
                                        <ul>
                                            <?php
                                            $items = explode(',', $recipe['recipe_desc']);
                                            foreach ($items as $key => $item) {
                                                if ($key < 5) {
                                                    echo '<li>' . $item . '</li>';
                                                } else {
                                                    break;
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </td>
                                    <?php if (count($items) > 5) { ?>
                                        <td class="space-three">
                                            <ul>
                                                <?php for ($i = 5; $i < count($items); $i++) {
                                                    echo '<li>' . $items[$i] . '</li>';
                                                } ?>
                                            </ul>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="container-child">
                <div class="inner-child">
                    <p>No recipes found for you.</p>
                </div>
            </div>
        <?php } ?>
        <div>
            <button type="button" id="backBtn" class="btn btn-primary">Back</button>
        </div><br>
    </div>
    <script src="JS/scriptnav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
