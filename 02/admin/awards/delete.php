<?php
//the page asks the user if they want to delete the item. As the user confirms,
//the item is removed from the database and the user is taken to the index page.
require __DIR__ . '/awards.php';
delete($_GET['0']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Awards-Delete</title>
</head>
<body>
    <form method="post" action='../awards/index.php'>
    <label for="delete">Do you want to delete this item?</label><br>
        <button class="btn btn-lg btn-outline-dark btn-primary" type="submit" name="delete" class="button" value="Delete">Delete</button>
    </form>
</body>
</html>