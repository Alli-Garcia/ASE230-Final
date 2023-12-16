<?php
require __DIR__ . '/db.php';
require __DIR__ . '/awards.php';

// Create an instance of AwardManager
$awardManager = new AwardManager($pdo);


// Check if the form is submitted for creating a new award
if(isset($_POST['submit'])){
    // Check if the keys exist in $_POST
    if(isset($_POST['year']) && isset($_POST['description'])){
        // Assuming you have form fields named 'year' and 'description'
        $year = $_POST['year'];
        $description = $_POST['description'];

        // Call the create method from the AwardManager
        $ref = $awardManager->create($year, $description);

        // Redirect to the index page with the correct 'id' parameter
        header("Location: index.php?id=" . ($ref - 1));
        exit();
    } else {
        // Handle the case where 'year' or 'description' is not set
        // You might want to display an error message or redirect back to the form
        //echo "Error: Missing 'year' or 'description' in the form submission.";
    }
}
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
