<?php

require_once __DIR__. '/models/articles.php';

$items = articles_getAll();                  // Получаем из БД все статьи

include __DIR__.'/views/main.php';          // и переходим на страницу их отображения

