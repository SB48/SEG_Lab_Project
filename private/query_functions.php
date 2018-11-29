<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 11/29/18
 * Time: 12:28 AM
 */

    function find_all_games(){
        global $db;
        $sql = "SELECT * FROM Game";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        return $result;
    }

?>