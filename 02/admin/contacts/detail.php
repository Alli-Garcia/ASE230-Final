<!-- detail.php -->

<?php
require('db.php');
require('contacts.php');

$contactManager = new ContactManager($pdo);

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $contactRequestId = $_GET['id'];

    // Retrieve the details of the specific contact request using the ContactManager instance
    $contactRequest = $contactManager->detail($contactRequestId);

    if ($contactRequest) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Request Details</title>
            <!-- Add your CSS styles or include Bootstrap if needed -->
        </head>
        <body>
            <h1>Contact Request Details</h1>
            <p>ID: <?php echo $contactRequest['id']; ?></p>
            <p>Name: <?php echo $contactRequest['name']; ?></p>
            <p>Email: <?php echo $contactRequest['email']; ?></p>
            <!-- Display other details as needed -->

            <!-- Add a form for edit button -->
            <form id="editForm" method="get" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $contactRequest['id']; ?>">
                <button type="button" onclick="submitForm()">Edit</button>
            </form>

            <!-- Add a delete button -->
            <form method="post" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $contactRequest['id']; ?>">
                <input type="hidden" name="confirm" value="yes">
                <button type="submit">Delete</button>
            </form>

            <!-- JavaScript to submit the form -->
            <script>
                function submitForm() {
                    document.getElementById('editForm').submit();
                }
            </script>
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
