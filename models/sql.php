<?php

function sql_Connect(){
    mysql_connect('localhost','root','');
    mysql_select_db('news');
}

function Connection($table){
    if (mysql_connect('localhost','root','')) {
        if ($res = mysql_select_db($table)) {   // зачем res? //
        }
        else{
            die("Соединение c БД не установлено! <br>");
        }
    }
    else{
        die ("Соединение c СУБД MySQL не установлено!<br>");
    }
}

function Disconnection(){
    if (!mysql_close()) {
        die ("Ошибка! Соединение не закрыто! <br>");
    }
}

function sql_Query($query){

    sql_Connect();

    $row = mysql_query( $query );

    $dba = [];
    while ($res = mysql_fetch_array($row)){
        $dba[] = $res;
    }
    return $dba;
}
function get_record($query){
    sql_Connect();

    $row = mysql_query($query);
    //return mysql_fetch_array($row);

    if ($record = mysql_fetch_array($row)){
        return $record;
    }
    return false;
}
function toDB($id, $dir, $filename, $comment, $visited){
    if ($res = mysql_query("INSERT INTO images(  id, dir, filename, comment, visited )
                                        VALUES('$id','$dir','$filename','$comment','$visited' )")) {
    }
    else{
        die ("Ошибка записи данных в таблицу! <br>");
    }
}

/*function record_toDB($pub_date, $title, $preview, $article){
    Connection('news');

    $query = "INSERT INTO articles ( pub_date, title, preview, article ) VALUES('$pub_date', '$title', '$preview ', '$article')";
    if ($res = mysql_query($query)){
        return true;
    }
    return false;
}*/

?>