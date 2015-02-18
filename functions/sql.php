<?php

function sql_Connect(){
    mysql_connect('localhost','root','');
    mysql_select_db('gallery');
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

?>