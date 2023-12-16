<head>
    <title>Edit</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('homes.php');

// Check if the 'home' parameter is set
if (!isset($_GET['home'])) {
    echo "Invalid request. Please provide a home ID.";
    exit;
}

$homeId = $_GET['home'];

// Get the details of the home based on the ID
$home = detail($homeId);

// Check if the home details are retrieved successfully
if (!$home) {
    echo "Home not found.";
    exit;
}
?>

<form method='post'>
    <div class='form-group h-100 d-flex flex-column align-items-center justify-content-center'>
        <label for='addressInput'>Address</label>
        <input type='text' class='form-control' name='addressInput' value="<?= $home['address'] ?>">
        <label for='cityInput'>City</label>
        <input type='text' class='form-control' name='cityInput' value="<?= $home['city'] ?>">
        <label for='stateInput'>State</label>
        <input type='text' class='form-control' name='stateInput' value="<?= $home['state'] ?>">
        <label for='zipcodeInput'>Zip Code</label>
        <input type='text' class='form-control' name='zipcodeInput' value="<?= $home['zipcode'] ?>">
        <label for='imageInput'>Image URL</label>
        <input type='text' class='form-control' name='imageInput' value="<?= $home['image'] ?>">
        <input type="submit" name="submitButton" class="btn btn-primary mt-2" value="Save Changes" />
    </div>
</form>

<?php

// Check if the form is submitted
if (isset($_POST['submitButton'])) {
    $editedHome = array(
        'address' => $_POST['addressInput'],
        'city' => $_POST['cityInput'],
        'state' => $_POST['stateInput'],
        'zipcode' => $_POST['zipcodeInput'],
        'image' => $_POST['imageInput']
    );

    // Edit the home details
    edit($homeId, $editedHome);

    // Redirect to the index page after editing
    header("Location: index.php");
    exit;
}
?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>
