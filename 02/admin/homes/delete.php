<?php
session_start(); // Start the session at the beginning

require_once('db.php'); // Assuming you have a file with database connection code
require_once('homes.php');

$pdo = getPdo(); // Use your function to get the PDO instance

function isAdmin($pdo, $username)
{
    // Assuming you have a 'users' table with an 'is_admin' column
    $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result && $result['is_admin'] == 1;
}

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    // Check if the logged-in user is an admin
    if (!isAdmin($pdo, $loggedInUsername)) {
        // Display an alert message if the user is not an admin
        echo '<script>alert("You are not an admin."); window.location.href="index.php";</script>';
        // You can also include additional HTML or redirect the user if needed
        exit();
    }
} else {
    // Redirect if the user is not logged in
    header('Location: index.php');
    exit();
}

// Check if the home ID is provided
if (isset($_GET['home'])) {
    $homeId = $_GET['home'];
} else {
    // Handle the case where home ID is not provided, redirect to index.php or show an error message
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class='h-100 d-flex flex-column align-items-center justify-content-center'>
        <h2>Are you sure you want to delete this item?</h2>
        <div class='flex-row'>
            <form method="post">
                <input name="deleteButton" type="submit" class="btn btn-danger" value="Delete">
                <input name="cancelButton" type="submit" class="btn btn-dark" value="Cancel">
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST['deleteButton'])) {
        // Assuming you have a delete function in your HomesManager class
        $homesManager = new HomesManager($pdo);
        $homesManager->delete($homeId);
        header('Location: index.php');
        exit();
    } elseif (isset($_POST['cancelButton'])) {
        header('Location: index.php');
        exit();
    }
    ?>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/smooth-scroll.polyfills.min.js"></script>
    <script src="../../js/gumshoe.polyfills.min.js"></script>

</body>

</html>
