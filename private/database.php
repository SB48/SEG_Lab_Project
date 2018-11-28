<?php
/**
 * Created by PhpStorm.
 * User: Marcik
 * Date: 2018-11-28
 * Time: 11:18
 */
require_once('db_credentials.php');

function db_connect(){
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

function db_disconnect($connection){
 if(isset($connection)){
     mysqli_close($connection);
 }
}

?>