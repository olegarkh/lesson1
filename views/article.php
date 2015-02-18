<?php

require_once __DIR__.'/../models/articles.php';
$article = get_article($_GET['id']);              // получаем статью по идентификатору из бд

?>

<!DOCTYPE html>                                   <!-- отображаем на экране -->
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php $article['title']?></title>
</head>
<body>
    <p><a href="../index.php">На главную</a></p>
    <h3><?php echo $article['title'];?></h3>
    <p><?php echo $article['pub_date']?></p>
    <p><?php echo $article['article']?></p>

</body>
</html>