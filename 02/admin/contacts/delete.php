<!-- delete.php -->

<?php
require('db.php');
require('team.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user has confirmed deletion
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
        // Get and validate the id of the item to delete
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($id !== false) {
            // Create an instance of TeamManager
            $teamManager = new TeamManager($pdo);

            try {
                // Delete the item from the database
                $deleted = $teamManager->deleteTeamMember($id);

                // Redirect to the index page if deletion is successful
                if ($deleted) {
                    header('location: index.php');
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
            echo 'Invalid ID parameter.';
        }
    } else {
        echo 'Deletion not confirmed.';
    }
} else {
    echo 'Invalid request method.';
}
?>
