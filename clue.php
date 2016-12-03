<?php
if (!isset($_GET['q'])) {
    $id = 1;
} else 
$id = $_GET['q'];
$sqlite = new SQLite3('data/data.sqlite');
$statement = $sqlite->prepare('select * from clue where id = :id');
$statement->bindValue(':id', $id, SQLITE3_INTEGER);
$result = $statement->execute();
$row = $result->fetchArray(SQLITE3_ASSOC);
$sqlite->close();
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $row['title']; ?> - 死穿白</title>
  <!-- Bootstrap core CSS -->
  <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
      <a href="/" class="navbar-text pull-right" style="margin-right: 15px; text-decoration: none;">返回</a>
      <a class="navbar-brand" href="#">死穿白</a>
    </div>
  </nav>
  <div class="container" style="margin-top: 70px;">
    <?php if ($id > 1) : ?>
    <a class="btn btn-default" href="clue.php?q=<?php echo $id - 1; ?>">Prev</a>
    <?php endif; ?>
    <span> <?php echo $id; ?> / 56 </span>
    <?php if ($id < 56) : ?>
    <a class="btn btn-default" href="clue.php?q=<?php echo $id + 1; ?>">Next</a>
    <?php endif; ?>
    <div class="clue"> 
      <h3><span class="glyphicon glyphicon-search"></span> <?php echo $row['title']; ?></h3>
      <p><?php echo str_replace("\n", '</p><p>', $row['content']); ?></p>
      <?php if ($row['img']) : ?>
      <img src="img/clue/<?php echo $row['img']; ?>">
      <?php endif; ?>
    </div>
    <hr>
    <footer>
      <div>Site by Infinity @ BJTU</div>
    </footer>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>
