<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
}

require_once '../../config/database.php';
$user_id = $_SESSION['user_id'];

// Récupérer les articles de l'utilisateur connecté.
$sql = "SELECT * FROM articles WHERE user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);

$articles = $stmt->fetchAll();

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
                <h2 class="float-start">Liste des articles</h2>
                <a class="btn btn-info float-end" href="create.php">Ajouter un article</a>
                <table class="table table-striped mt-5">
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    foreach ($articles as $article) {
                    ?>
                        <tr>
                            <td>
                                <img src="../<?= $article['image_path'] ?>" class="rounded-circle" width="50px" alt="<?= $article['image_path'] ?>">
                            </td>
                            <td><?= $article['title'] ?></td>
                            <td><?= $article['price'] ?> €</td>
                            <td><?= $article['description'] ?></td>
                            <td>
                                <a class="btn btn-success" href="edit.php?id=<?= $article['id'] ?>">Editer</a>
                                <a href="../../controllers/post_delete_article.php?id=<?= $article['id'] ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>