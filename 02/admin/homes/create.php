<?php
session_start();

require_once('db.php'); // Assuming you have a file with database connection code
require_once('homes.php');

$pdo = getPdo(); // Use your function to get the PDO instance

// Function to check if the user is an admin

function isAdmin($pdo, $username)
{
    // Assuming you have a 'users' table with an 'is_admin' column
    $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($result); // Add this line for debugging

    return $result && $result['is_admin'] == 1;
}

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    var_dump($_SESSION['username']);
    $loggedInUsername = $_SESSION['username'];

    // Check if the logged-in user is an admin
    if (!isAdmin($pdo, $loggedInUsername)) {
        // Display an alert message if the user is not an admin
        echo '<script>alert("You are not an admin."); window.location.href="index.php";</script>';
        // You can also include additional HTML or redirect the user if needed
        exit();
    }
} else {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Continue with the rest of the code only if the user is an admin
?>