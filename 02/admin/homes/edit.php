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
if (!isset($_SESSION['username'])) {
    echo "You are not logged in.";
    exit();
}

$loggedInUsername = $_SESSION['username'];

// Check if the logged-in user is an admin
if (!isAdmin($pdo, $loggedInUsername)) {
    // Display an alert message if the user is not an admin
    echo '<script>alert("You are not an admin. Access denied.");</script>';
    // Redirect the user to a safe location or the homepage
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

// Check if the 'home' parameter is set
if (!isset($_GET['home'])) {
    echo "Invalid request. Please provide a home ID.";
    exit;
}

$homeId = $_GET['home'];

// Instantiate HomesManager
$homesManager = new HomesManager($pdo);

// Get the details of the home based on the ID
$home = $homesManager->detail($homeId);

// Check if the home details are retrieved successfully
if (!$home) {
    echo "Home not found.";
    exit;
}

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
    $homesManager->edit($homeId, $editedHome);

    // Redirect to the detail page after editing
    header('Location: detail.php?home=' . urlencode($homeId));

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

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

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/smooth-scroll.polyfills.min.js"></script>
    <script src="../../js/gumshoe.polyfills.min.js"></script>

</body>

</html>
