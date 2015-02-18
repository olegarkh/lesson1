<?php

require_once __DIR__. '/models/articles.php';

$items = articles_getAll();

include __DIR__.'/views/main.php';

