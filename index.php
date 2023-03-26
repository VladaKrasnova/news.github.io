<?php require 'db.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Новости</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="header">
    <h1 class="container header-text text-center">Новости</h1>
  </div>


  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $limit = 5;
  $offset = $limit * ($page - 1);
  $count_sql = 'SELECT COUNT(*) FROM `news`';
  $result = mysqli_query($db, $count_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $limit);

  $previous = $page - 1;
  if ($previous < 1) {
    $previous = 1;
  }
  $next = $page + 1;

  $news = mysqli_query($db, "SELECT * FROM `news` ORDER BY idate DESC LIMIT $offset, $limit");
  while ($new = mysqli_fetch_assoc($news)) {
  ?>
    <div class="card-box">
      <div class="container card">
        <div class="card-body">
          <h5 class="card-title"><?= $new['title'] ?></h5>
          <p class="card-text"><?= $new['announce'] ?></p>
          <div class="card-info">
            <a href="view.php?id=<?= $new['id'] ?>" class="card-link">Читать еще</a>
            <p class="card-text"><small class="text-body-secondary"><?= date('d/m/Y', $new['idate']) ?></small></p>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <div class="navnews">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a href="index.php?page=<?= $previous ?>'" class="page-link">Назад</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="index.php?page=<?= $next ?>'">Вперед</a>
        </li>
      </ul>
    </nav>
  </div>
</body>

</html>