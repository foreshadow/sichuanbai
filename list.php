<?php
$sqlite = new SQLite3('data/data.sqlite');
$statement = $sqlite->prepare('select * from clue');
$result = $statement->execute();
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
      <a href="/" class="navbar-text pull-right" style="margin-right: 15px; text-decoration: none;">详细</a>
      <a class="navbar-brand" href="#">死穿白</a>
      <p class="navbar-text text-center" style="margin-right: 15px; text-decoration: none;">所有线索</p>
    </div>
  </nav>
  <div class="container" style="margin-top: 70px;">
    <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) : ?>
    <div class="clue"> 
      <p><span class="glyphicon glyphicon-search"></span> <a href="/clue.php?q=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></p>
    </div>
    <?php endwhile; $sqlite->close(); ?>
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
