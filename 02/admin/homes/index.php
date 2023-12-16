<head>
    <title>Index</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('homes.php');
require('db.php'); // Include your database connection file

$homesManager = new HomesManager($pdo); // Assuming $pdo is your PDO instance for MySQL
$homes = $homesManager->index();
?>

<div class='h-100 d-flex flex-column align-items-center justify-content-center'>
    <table class='mx-auto'>
        <tr>
            <th>Address</th>
        </tr>
        <?php
            foreach ($homes as $i => $home) {
                echo '<tr>
                        <td><a href="detail.php?home=' . $home['id'] . '">' . $home['address'] .  '</a></td>
                    </tr>';
            }
        ?>
    </table>
    <button type='button' class='btn btn-primary mt-3' onclick='window.location.href="create.php"'>Create</button>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>
