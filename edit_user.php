<?php
    require 'db.php';

    // Check if the user ID is provided in the URL
    if (isset($_GET['user_id'])) {
        // Retrieve the user ID from the URL
        $userId = $_GET['user_id'];

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the edited user information from the form
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];

            // Update the user information in the database
            $query = "UPDATE userapp SET phone_number = ?, email = ?, password = ?, username = ? WHERE user_id = ?";
            $statement = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($statement, 'ssssi', $phone_number, $email, $password, $username, $userId);
            $result = mysqli_stmt_execute($statement);

            // Check if the update was successful
            if ($result) {
                // Redirect back to the user listing page
                header("Location: admin_editUser.php");
                exit();
            } else {
                // Handle the update error
                $error = "Failed to update the user information.";
            }

            // Close the prepared statement
            mysqli_stmt_close($statement);
        }

        // Retrieve the existing user information from the database
        $query = "SELECT * FROM userapp WHERE user_id = ?";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, 'i', $userId);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        // Check if the user exists
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
        } else {
            // Handle the case where the user doesn't exist
            $error = "User not found.";
        }

        // Close the prepared statement
        mysqli_stmt_close($statement);
    } else {
        // Handle the case where the user ID is not provided
        $error = "User ID not provided.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .container {
        width: 50%;
        margin-top: 30px;
    }
    .error {
        color: red;
        margin-bottom: 10px;
    }
</style>
<body>
    <?php require 'navBar_admin.html'; ?>
    <div class="container">
        <h2>Edit User</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (isset($user)) { ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
