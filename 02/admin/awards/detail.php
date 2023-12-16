<?php
//the page shows a specific item. Also, a "delete" button enables you to delete the item, whereas an "edit" button enables the user to go to the edit page described below.
//print_r($_POST);
//print '<pre>' . print_r($_POST, true) . '</pre>';
require __DIR__ . '/awards.php';
detail($_POST['award']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Awards-Detail</title>
</head>
<body>
    <form action="../awards/edit.php" method='get'>
	<button class="btn btn-lg btn-outline-dark btn-primary" name="0" type="submit" value=<?php echo $_POST['award']//is int ?>>Edit</button></br>
</form>
    <form action="../awards/delete.php" method='get'>
    <button class="btn btn-lg btn-outline-dark btn-primary" name="0" type="submit" value=<?php echo $_POST['award']//is int ?>>Delete</button>
</form>
</form>
</body>
</html>
<?php
?>