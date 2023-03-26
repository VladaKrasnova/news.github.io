<?php require 'db.php';

    $id= $_GET['id'];
    $post = getSinglesById($id);
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новость</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container link">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.php">Все новости</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $post['title']?></li>
            </ol>
        </nav>
    </div>

    <div class="container view">
        <div class="card-box">
          <div class="container card">
            <div class="card-body">
            <h5 class="card-title"><?= $post['title']?></h5>
            <p class="card-text"><?= $post['content']?></p>
            <p class="card-text"><small class="text-body-secondary"><?=date('d/m/Y', $post['idate'])?></small></p>
            </div>
          </div>
        </div >
</body>
</html>