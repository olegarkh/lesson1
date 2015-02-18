<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 07.02.15
 * Time: 11:54
 */

/*   ..lesson6..   */

define('_CAT_','/images/');               //Каталог для хранения изображений

function Extension($filename)             //Возвращаем расширение  заданного файла
{
    return pathinfo($filename, PATHINFO_EXTENSION);
}

function ImageFile($filename)            //Если файл является изображением - возвращаем имя файа
{
    $arr = ['png','jpg','bmp','tif','gif','PNG','JPG','BMP','GIF','TIF'];

    foreach ($arr as $value){
        if (Extension($filename) == $value) {
            return $filename;
        }
    }
    return false;
}

function ImageArray($dir)                 //Создаем массив с именами файлов изображений
{
    $arr = [];

    foreach ($dir as $file){
        if (ImageFile($file)) {
            $arr[] = ImageFile($file);
        }
    }
    return $arr;
}

/*     .. lesson5 ..    */

function checkLoginPassword($login, $password){
    $users = ['oleg'=>'234','sasha'=>'123','lena'=>'lenok75',''];
    return $users[$login] && $password == $users[$login];
}

function isLogin(){
    return isset($_POST['login']);
}

function setLogin($login){
    setcookie('auth', $login, time() + 86400);        //Кука устанавливается на год
}
function isUser(){
    return isset($_COOKIE['auth']);
}
function getUser(){
    return $_COOKIE['auth'];
}

/*     ..lesson7..    */

function ErrorMessageStr(){                   // Если есть ошибка, выводит сообщение. Занимает строку.
    session_start();
    if (isset ($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset ($_SESSION['error']);
    } else {
        echo "<br>";
    }
}
function Connection(){
    if (mysql_connect('localhost','root','')) {
        if ($res = mysql_select_db('gallery')) {   // зачем res?
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

function fromDB(){
            if ($res = mysql_query('SELECT * from images ')) {
                $dba = [];

                while ($row = mysql_fetch_assoc($res)) {

                    $dba['id'][] = $row['id'];
                    $dba['dir'][] = $row['dir'];
                    $dba['filename'][] = $row['filename'];
                    $dba['comment'][] = $row['comment'];
                    $dba['visited'][] = $row['visited'];
                }

                session_start();
                $_SESSION['db_date'] = $dba;

            } else {
                die ("Ошибка выполнения запроса к таблице! <br>");
            }
}

function toDB($id, $dir, $filename, $comment, $visited){
    if ($res = mysql_query("INSERT INTO images(  id, dir, filename, comment, visited )
                                        VALUES('$id','$dir','$filename','$comment','$visited' )")) {
    }
    else{
        die ("Ошибка записи данных в таблицу! <br>");
    }
}
function fromDB_sort(){

    //SELECT * FROM books ORDER BY price DESC;
    if ($res = mysql_query('SELECT * from images ORDER BY visited DESC')) {
        $dba = [];

        while ($row = mysql_fetch_assoc($res)) {

            $dba['id'][] = $row['id'];
            $dba['dir'][] = $row['dir'];
            $dba['filename'][] = $row['filename'];
            $dba['comment'][] = $row['comment'];
            $dba['visited'][] = $row['visited'];
        }

        session_start();
        $_SESSION['db_date'] = $dba;

    } else {
        die ("Ошибка выполнения запроса к таблице! <br>");
    }
}
function visit_to_photo($num, $id){

    if ($res = mysql_query("UPDATE images SET visited='$num' WHERE filename='$id' ")){
        return $res;
    }
    else {
        echo ("Ошибка выполнения запроса на оновление ! <br>");
    }
}
?>