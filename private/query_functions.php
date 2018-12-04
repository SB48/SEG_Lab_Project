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
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_staff(){
        global $db;
        $sql = "SELECT * FROM Staff ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_rentals(){
        global $db;
        $sql = "SELECT * FROM Rental ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_member_name($memberID){
        global $db;
        $sql = "SELECT firstName, lastName FROM Member WHERE memberID = $memberID";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_how_many_games_are_rented($memberID){
        global $db;
        $sql = "SELECT COUNT(rentalID) FROM Member WHERE memberID = $memberID AND returned = false";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_how_many_games_can_rent(){
        global $db;
        $sql = "SELECT value FROM Rules WHERE rule = 'rentalLimit'";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }


    function find_is_banned($memberID){
        global $db;
        $sql = "SELECT normalBan FROM Member WHERE memberID = $memberID";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_violations_possible(){
        global $db;
        $sql = "SELECT value FROM Rules WHERE rule = 'numViolationsForBan'";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }
    //current date


    function find_violations_in_grace_period($memberID){
        global $db;
        $sql = "SELECT COUNT(memberID) FROM Violates WHERE memberID = $memberID AND nullified = false";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_amount_due($memberID){
        global $db;
        $sql = "SELECT amountDue FROM Member WHERE memberID = $memberID";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }



?>