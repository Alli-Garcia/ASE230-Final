<head>
    <title>Create</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require_once('db.php'); // Assuming you have a file with database connection code
require_once('homes.php');

$pdo = getPdo(); // Use your function to get the PDO instance
?>

<form method='post'>
    <div class='form-group h-100 d-flex flex-column align-items-center justify-content-center'>
        <label for='addressInput'>Address</label>
        <input type='text' class='form-control' name='addressInput'>
        <label for='cityInput'>City</label>
        <input type='text' class='form-control' name='cityInput'>
        <label for='stateInput'>State</label>
        <input type='text' class='form-control' name='stateInput'>
        <label for='zipcodeInput'>Zip Code</label>
        <input type='text' class='form-control' name='zipcodeInput'>
        <label for='imageInput'>Image URL</label>
        <input type='text' class='form-control' name='imageInput'>
        <input type="submit" name="submitButton" class="btn btn-primary mt-2" value="Submit" />
    </div>
</form>

<?php

if (isset($_POST['submitButton'])) {
    $newHome = array(
        'address' => $_POST['addressInput'],
        'city' => $_POST['cityInput'],
        'state' => $_POST['stateInput'],
        'zipcode' => $_POST['zipcodeInput'],
        'image' => $_POST['imageInput']
    );

    // Assuming you have a create function in your HomesManager class
    $homesManager = new HomesManager($pdo);
    $homesManager->create($newHome);

    header('Location: index.php');
    exit();
}
?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>
