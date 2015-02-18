<?php
//include __DIR__.'/../models/articles.php';

//$items = articles_getAll();

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Список статей</title>
</head>
<body>
  <a href="views/load.php">Добавить статью</a>
  <?php foreach ($items as $item):?>
      <h3><?php echo $item['title'];?></h3>
      <p><?php echo $item['pub_date'];?></p>
      <p><?php echo $item['preview'];?></p>
      <a href="views/article.php<?php echo "?id=".$item['id'];?>"> Читать далее...</a>
      <a href="views/load.php<?php echo "?id=".$item['id'];?>"> Редактировать статью</a>
  <?php endforeach; ?>
</body>
</html>