<?php

require __DIR__.'/models/articles.php';

$pub_date = $_POST['date'];
$title = $_POST['title'];
$preview = $_POST['preview'];
$article = $_POST['article'];

$res = record_toDB($pub_date, $title, $preview, $article);

if ($res){
    header('Location: index.php');
}
else {
    header('Location: /views/load.php');
}