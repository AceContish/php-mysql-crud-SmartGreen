<?php
    session_start();
    require 'db.php';

    // Retrieve all users from the "userapp" table
    $query = "SELECT * FROM userapp";
    $result = mysqli_query($conn, $query);

    // Check if there are any users
    if (mysqli_num_rows($result) > 0) {
        // Fetch each user as an associative array
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .container-column {
        width: 100%;
        background-color: #D9D9D9;
    }
</style>
<body>
<?php require 'navBar_admin.html'; ?>
<br><center><h2>All User Info</h2></center><br><br>
<div class="container">
    <div class="container-column">
        <?php if (isset($users) && !empty($users)) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['phone_number']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td>
                                <a href="edit_user.php?user_id=<?php echo $user['user_id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No users found.</p>
        <?php } ?>
    </div>
</div>
<script src="JS/scriptnav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
