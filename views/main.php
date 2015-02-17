<?php
//include __DIR__.'/../models/articles.php';

//$items = articles_getAll();

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
  <?php foreach ($items as $item):?>
      <h3><?php echo $item['name'];?></h3>
      <p><?php echo $item['date'];?></p>
      <p><?php echo $item['content'];?></p>
  <?php endforeach; ?>
</body>
</html>