<?php

require __DIR__ . '/db.php';
require __DIR__ . '/team.php';

$teamManager = new TeamManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle form submission
    $name = $_POST['name'];
    $role = $_POST['role'];
    $bio = $_POST['bio'];

    // Save new team member to the MySQL database
    
    $teamManager->createTeamMember(['Team member' => $name, 'Role' => $role, 'Bio' => $bio]);

    // Redirect to the index
    header('Location: index.php');
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Team Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>    

<h1>Create New Team Member</h1>

<form method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="role">Role:</label>
    <input type="text" id="role" name="role" required>

    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio" required></textarea>

    <button type="submit">Create</button>
</form>
</body>
</html>
