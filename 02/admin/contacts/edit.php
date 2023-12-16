<?php
require('db.php');
require('contacts.php');

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $contactRequestId = $_GET['id'];

    // Create an instance of ContactManager
    $contactManager = new ContactManager($pdo);

    // Retrieve the details of the specific contact request using the ContactManager instance
    $contactRequest = $contactManager->detail($contactRequestId);

    if ($contactRequest) {
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the updated data from the form
            $updatedData = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
            ];

            // Update the contact request in the MySQL database
            $contactManager->edit($contactRequestId, $updatedData);

            // Redirect to detail.php
            header('Location: detail.php?id=' . $contactRequestId);
            exit;
        }

        // Display a form with current contact request data to the user
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Contact Request</title>
            <!-- Add your CSS styles or include Bootstrap if needed -->
        </head>
        <body>
            <h1>Edit Contact Request</h1>
            <!-- Display current data in the form -->
            <form method="post" action="">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo isset($contactRequest['name']) ? $contactRequest['name'] : ''; ?>"><br>

                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo isset($contactRequest['email']) ? $contactRequest['email'] : ''; ?>"><br>

                <input type="submit" value="Save changes">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo 'Contact request not found.';
    }
} else {
    echo 'ID parameter not provided.';
}
?>
