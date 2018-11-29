<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 11/29/18
 * Time: 12:28 AM
 */

    function find_all_games(){
        global $db;
        $sql = "SELECT * FROM Game ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_members(){
        global $db;
        $sql = "SELECT * FROM Member ";
        $sql = "ORDER BY name ASC";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

?>