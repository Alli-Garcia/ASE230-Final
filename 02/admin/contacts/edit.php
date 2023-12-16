<?php
require('db.php');

require('team.php');

// Get index of the item to edit
$index = $_GET['index'];


// Create TeamManager instance with PDO
$teamManager = new TeamManager($pdo);

// Get item to edit
$item = $teamManager->getTeamMemberById($index); // Assuming you have a method to fetch a team member by ID

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated data from the form
    $updatedData = [
        'Team member' => $_POST['team_member'],
        'Role' => $_POST['role'],
        'Bio' => $_POST['bio'],
    ];

    // Update the team member in the MySQL database
    $teamManager->updateTeamMemberById($index, $updatedData); // Assuming you have a method to update a team member by ID

    // Redirect to index.php
    header('Location: index.php');
    exit;
}

// Display a form with current item data to user
echo '<form method="post" action="">'; // The action is empty to submit the form to the same page
echo 'Team member: <input type="text" name="team_member" value="' . $item['Team member'] . '"><br>';
echo 'Role: <input type="text" name="role" value="' . $item['Role'] . '"><br>';
echo 'Bio: <textarea name="bio">' . $item['Bio'] . '</textarea><br>';
echo '<input type="hidden" name="index" value="' . $index . '">';
echo '<input type="submit" value="Save changes">';
echo '</form>';
?>
