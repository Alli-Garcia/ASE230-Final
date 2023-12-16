<?php
require_once('db.php'); // Assuming you have a file with database connection code
require_once('homes.php');

$pdo = getPdo(); // Use your function to get the PDO instance

$homesManager = new HomesManager($pdo);

$homeId = $_GET['home'];
$home = $homesManager->detail($homeId);
?>

<head>
    <title>Detail</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<div class='h-100 d-flex flex-column align-items-center justify-content-center'>
    <?php if ($home) { ?>
        <h2><?= $home['address'] ?></h2>
        <p><?= $home['state'] ?></p>
        <p><?= $home['city'] ?>, <?= $home['zipcode'] ?></p>
        <img src="<?= $home['image'] ?>" class='img-fluid'>
        <div>
            <button class="btn btn-danger" onclick="window.location.href='delete.php?home=<?= $homeId ?>'">Delete</button>
            <button class="btn btn-secondary" onclick="window.location.href='edit.php?home=<?= $homeId ?>'">Edit</button>
        </div>
    <?php } else { ?>
        <p>Home not found.</p>
    <?php } ?>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>
