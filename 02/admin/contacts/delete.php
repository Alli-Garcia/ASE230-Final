<?php
require('db.php');
require('contacts.php');

// Start the session (add this at the beginning of your script)
session_start();

// Assuming you have stored the username in the session during login
$loggedInUsername = $_SESSION['username'] ?? null;

// Your isAdmin function
function isAdmin($pdo, $username)
{
    $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result && $result['is_admin'] == 1;
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user has confirmed deletion
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
        // Get and validate the ID of the item to delete
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        // Check if the user is an admin
        if (!isAdmin($pdo, $loggedInUsername)) {
            // Non-admin user, show alert and redirect to detail
            echo '<script>alert("You do not have permission to delete.");</script>';
            header('Location: detail.php?id=' . $id);
            exit;
        }

        if ($id !== false) {
            // Create an instance of ContactManager
            $contactManager = new ContactManager($pdo);

            try {
                // Delete the item from the database
                $deleted = $contactManager->delete($id);

                // Redirect to the index page if deletion is successful
                if ($deleted) {
                    header('Location: index.php');
                    exit();
                } else {
                    // Handle deletion failure, e.g., display an error message
                    echo 'Deletion failed.';
                }
            } catch (Exception $e) {
                // Handle exceptions, e.g., log the error
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            // Handle invalid ID
            echo 'Invalid ID.';
        }
    } else {
        echo 'Deletion not confirmed.';
    }
} else {
    echo 'Invalid request method.';
}
?>
