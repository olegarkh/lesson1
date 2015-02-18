<?php

require __DIR__.'/../functions/sql.php';

function articles_getAll(){

    sql_Connect();
    $query = 'SELECT * FROM articles ORDER BY pub_date DESC';
    $arr = sql_Query($query);
    Disconnection();

    return $arr;
}

function get_article($id){
   //sql_Connect();
   Connection('news');
   $query = "SELECT * FROM articles WHERE id = '$id' ";

    return get_record($query);
}

function record_toDB($pub_date, $title, $preview, $article){
    Connection('news');

    $query = "INSERT INTO articles ( pub_date, title, preview, article ) VALUES('$pub_date', '$title', '$preview ', '$article')";
    if ($res = mysql_query($query)){
        Disconnection();
        return true;
    }
    Disconnection();
    return false;
}
?>