<?php
require __DIR__ . '/db.php';
require __DIR__ . '/awards.php';

// Create an instance of AwardManager
$awardManager = new AwardManager($pdo);

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect if the user is not logged in
    header("Location: index.php");
    exit();
}

$loggedInUsername = $_SESSION['username'];

// Define a simple isAdmin function
function isAdmin($pdo, $username)
{
    $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result && $result['is_admin'] == 1;
}

if (!isAdmin($pdo, $loggedInUsername)) {
    // Display an alert message if the user is not an admin
    echo '<script>alert("You are not an admin. Access denied."); window.location.href="index.php";</script>';
    // You can also include additional HTML or redirect the user if needed
    exit();
}

// Rest of your code...
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Awards-Create</title>
</head>
<body>
    <form method="post" action="create.php">
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Create Request</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
