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
    function find_all_staff(){
        global $db;
        $sql = "SELECT * FROM Staff ";
        $sql = "ORDER BY name ASC";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }
    function find_all_rentals(){
        global $db;
        $sql = "SELECT * FROM Rentals ";
        $sql = "ORDER BY name ASC";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    //age rating less than 12
    function ageUnder12() {
        global $db;
        $ageUnder12 = "SELECT * from Game ";
        $ageUnder12 .= "WHERE ageRating='PG' OR ageRating='3' OR ageRating='7'";
        $ageUnder12_set = mysqli_query($db, $ageUnder12);
        return $ageUnder12_set;
    }
    //age rating less than 18
    function ageUnder18() {
        global $db;
        $ageUnder18 = "SELECT * from Game ";
        $ageUnder18 .= "WHERE ageRating='PG' OR ageRating='3' ";
        $ageUnder18 .= "OR ageRating='7' ageRating='12' OR ageRating='16' ";
        $ageUnder18 .= "OR ageRating='16' ageRating='12'";
        $ageUnder18_set = mysqli_query($db, $ageUnder18);
        return $ageUnder18_set;
    }
    //age rating more than + equals to 18
    function ageOver18() {
        global $db;
        $ageOver18 = "SELECT * from Game ";
        $ageOver18 .= "WHERE ageRating='18'";
        $ageOver18_set = mysqli_query($db, $ageOver18);
        return $ageOver18_set;
    }
    //PC platform
    function pc() {
        global $db;
        $pc = "SELECT * from Game ";
        $pc .= "WHERE platform='PC'";
        $pc_set = mysqli_query($db, $pc);
        return $pc_set;
    }
    //XBOX platform
    function xbox() {
        global $db;
        $xbox = "SELECT * from Game ";
        $xbox .= "WHERE platform='XBOX'";
        $xbox_set = mysqli_query($db, $xbox);
        return $xbox_set;
    }
    //PS4 platform
    function ps4() {
        global $db;
        $ps4 = "SELECT * from Game ";
        $ps4 .= "WHERE platform='PS4'";
        $ps4_set = mysqli_query($db, $ps4);
        return $ps4_set;
    }
    //all available games
    function availableGames() {
        global $db;
        $availableGames = "SELECT * from Game ";
        $availableGames .= "WHERE copies>0";
        $availableGames_set = mysqli_query($db, $availableGames);
        return $availableGames_set;
    }
    //price
    function priceAsc() {
        global $db;
        $priceAsc = "SELECT * from Game ";
        $priceAsc .= "ORDER BY price ASC";
        $priceAsc_set = mysqli_query($db, $priceAsc);
        return $priceAsc_set;
    }
    //specific game
    function find_game($id) {
        global $db;
        $thisGame = "SELECT * from Game WHERE gameID = $id ";
        $thisGame .= "ORDER BY name ASC";
        $thisGame_set = mysqli_query($db, $thisGame);
        confirm_result_set($thisGame_set);
        return $thisGame_set;
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
        $sql = "SELECT COUNT(rentalID) FROM Rental WHERE memberID = $memberID AND returned = false";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }
    function find_how_many_games_can_rent(){
        global $db;
        $sql = "SELECT ruleVal FROM Rules WHERE rule = 'rentalLimit'";
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
        $sql = "SELECT ruleVal FROM Rules WHERE rule = 'numViolationsForBan'";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }
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
    function find_current_rentals($memberID){
        global $db;
        $sql ="SELECT COUNT(Game.gameID), Game.gameID, Rental.gameID, Game.name, Rental.returnDate, Rental.returned ";
        $sql .= "FROM Rental, Game.gameID ";
        $sql .= "INNER JOIN Rental ON Rental.gameID = Game.gameID ";
        $sql .= "WHERE Rental.memberID = $memberID AND Rental.returned = false";
        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }
    
?>