<!-- detail.php -->

<?php
require('db.php');
require('team.php');

$teamManager = new TeamManager($pdo);

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $teamMemberId = $_GET['id'];

    // Retrieve the details of the specific team member using the TeamManager instance
    $teamMember = $teamManager->getTeamMemberById($teamMemberId);

    if ($teamMember) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Team Member Details</title>
            <!-- Add your CSS styles or include Bootstrap if needed -->
        </head>
        <body>
            <h1>Team Member Details</h1>
            <p>ID: <?php echo $teamMember['id']; ?></p>
            <p>Name: <?php echo $teamMember['team_member']; ?></p>
            <p>Role: <?php echo $teamMember['role']; ?></p>
            <p>Bio: <?php echo $teamMember['bio']; ?></p>
            <!-- Display other details as needed -->

            <!-- Add a delete button -->
            <form method="post" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $teamMember['id']; ?>">
                <input type="hidden" name="confirm" value="yes">
                <button type="submit">Delete</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo 'Team member not found.';
    }
} else {
    echo 'ID parameter not provided.';
}
?>
