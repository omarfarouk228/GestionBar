<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../public/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid border dashboard h-100">
        <div class="row">
            <?php include('../menu.php') ?>
            <div class="col-lg-9 p-2">
                <h2>Ajouter un article</h2>
                <?php
                if (isset($_GET['success'])) {
                    $message = "";
                    if ($_GET['success'] == 1) {
                        $message = "Nouvel article ajouté avec succès!";
                    } else {
                        $message = "Erreur survenue lors de l'enregistrement. Veuillez réessayer!";
                    }
                ?>
                    <div class="alert <?= ($_GET['success'] == 1) ? 'alert-success' : 'alert-danger' ?> text-start"><?= $message ?></div>
                <?php
                }
                ?>
                <form action="../../controllers/post_create_article.php" method="POST" class="text-center">
                    <div class="form-group text-start">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control mt-2" placeholder="Ex: Fanta Orange" name="title" id="title" required>
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="price">Prix en €</label>
                        <input type="number" class="form-control mt-2" placeholder="Ex: 50" name="price" id="price" required>
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control mt-2" placeholder="Ex: Decrivez votre article" name="description" id="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-4 px-5 py-2 fw-bold">Ajouter</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>