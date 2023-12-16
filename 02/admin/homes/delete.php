<head>
    <title>Delete</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require_once('db.php'); // Assuming you have a file with database connection code
require_once('homes.php');

$pdo = getPdo(); // Use your function to get the PDO instance

if (isset($_GET['home'])) {
    $homeId = $_GET['home'];
} else {
    // Handle the case where home ID is not provided, redirect to index.php or show an error message
    header('Location: index.php');
    exit();
}
?>

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
