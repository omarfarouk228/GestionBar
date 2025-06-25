<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
}

// Requête pour récupérer les informations de l'article
require_once '../../config/database.php';
$article_id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$article_id]);

$article = $stmt->fetch();

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
                <h2>Editer un article</h2>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                ?>
                    <div class="alert alert-danger text-start">Une erreur est survenue lors de l'édition de l'article.</div>
                <?php
                }
                ?>
                <form action="../../controllers/post_edit_article.php" method="POST" class="text-center">
                    <input type="text" value="<?= $article['id'] ?>" name="article_id" hidden>
                    <div class="form-group text-start">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control mt-2" value="<?= $article['title'] ?>" placeholder="Ex: Fanta Orange" name="title" id="title" required>
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="price">Prix en €</label>
                        <input type="number" class="form-control mt-2" value="<?= $article['price'] ?>" placeholder="Ex: 50" name="price" id="price" required>
                    </div>
                    <div class="form-group text-start mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control mt-2" placeholder="Ex: Decrivez votre article" name="description" id="description" required><?= $article['description'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-4 px-5 py-2 fw-bold">Editer</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>