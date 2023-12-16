<?php
session_start();

include_once 'db.php';

function registerUser($username, $password) {
    global $conn;

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    return $stmt->execute();
}

function authenticateUser($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT user_id, username, email, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    // Bind the result variables
    $stmt->bind_result($user_id, $username, $email, $hashed_password);

    // Fetch the result
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        return true;
    }

    return false;
}


function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

function logout() {
    session_unset();
    session_destroy();
}
?>
