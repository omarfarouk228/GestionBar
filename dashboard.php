<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="public/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid border dashboard h-100">
        <div class="row">
            <div class="col-lg-3 bg-secondary p-3">
                <h3 class="text-white">GestionBar</h3>
                <hr>
                <ul class="list-group">
                    <li class="list-group-item mb-2"><a href="dashboard.php" class="text-decoration-none text-dark">Tableau de bord</a></li>
                    <li class="list-group-item"><a href="controllers/post_logout.php" class="text-decoration-none text-dark">Se d&eacute;connecter</a></li>
                </ul>
            </div>
            <div class="col-lg-6" style="font-size:1.5rem">
                Bonjour <b><?= $_SESSION['fullname'] ?></b>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>