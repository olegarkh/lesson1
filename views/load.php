<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Загрузить статью</title>
</head>
<body>
   <p><a href="../index.php">На главную</a></p>
   <form action="../add.php" method="post">
       <p><label>Введите дату<br><input type="date" name="date"></label></p>
       <p><label>Введите название статьи<br><input type="text" name="title" size="100"></label></p>
       <p><label>Превью для статьи<br><textarea name="preview" rows="7" cols="80"></textarea></label></p>
       <p><label>Текст статьи<br><textarea name="article" rows="15" cols="80"></textarea></label></p>
       <p><input type="submit" name="sub" value="Отправить"></p>
   </form>
</body>
</html>