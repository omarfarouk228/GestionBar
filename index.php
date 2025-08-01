<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: pages/dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionBar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
</head>

<body class="auth">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-white mt-5 text-center p-5 rounded-3 shadow">
                <h2>GestionBar</h2>
                <p>Veuillez vous connecter pour accéder au tableau de bord.</p>
                <?php
                if (isset($_GET['error'])) {
                    $message = "";
                    if ($_GET['error'] == 1) {
                        $message = "Adresse mail inexistante. Veuillez réessayer!";
                    } else {
                        $message = "Mot de passe incorrect. Veuillez réessayer!";
                    }
                ?>
                    <div class="alert alert-danger text-start"><?= $message ?></div>
                <?php
                }

                ?>
                <form action="controllers/post_login.php" method="POST">
                    <div class="form-group text-start">
                        <label for="email">Adresse mail</label>
                        <input type="email" class="form-control mt-2" placeholder="John@gmail.com" name="email" id="email" required>
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control mt-2" placeholder="********" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-4 px-5 py-2 fw-bold">Se connecter</button>
                </form>

                <a href="pages/register.php" class="mt-3 d-block text-dark">Vous n'avez pas de compte? Inscrivez-vous</a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>