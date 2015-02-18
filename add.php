<?php

require __DIR__.'/models/articles.php';

$pub_date = $_POST['date'];                    //Получаем из формы информацию по новости
$title = $_POST['title'];
$preview = $_POST['preview'];
$article = $_POST['article'];

$res = record_toDB($pub_date, $title, $preview, $article); // отсылаем в БД

if ($res){
    header('Location: index.php');              // отправляемся на главную страницу
}
else {
    header('Location: /views/load.php');        // в случае неудачи остаемся редактировать новость
}