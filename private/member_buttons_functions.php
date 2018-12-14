<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 12/04/18
 * Time: 11:46 PM

 */



/**
 * Used in the most common scenario that a member
 * correctly returns a game.
 * @param $rentalID, $gameID
 * @return $result
 */
function normalReturn($rentalID, $gameID){
    global $db;
    $sql1 = "UPDATE Rental SET returned = true WHERE rentalID = $rentalID";
    $result1 = mysqli_query($db,$sql1);
    confirm_result_set($result1);

    $sql2 = "UPDATE Game ";
    $sql2 .= "SET copies = copies + 1 ";
    $sql2 .= "WHERE gameID =  $gameID";
    $result2 = mysqli_query($db,$sql2);
    confirm_result_set($result2);
    return $result2;
}

function closeTheRental($rentalID){
    global $db;
    $sql = "UPDATE Rental SET returned = true WHERE rentalID = $rentalID";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}

function late($memberID){
    global $db;
    $sql = "INSERT INTO Violates (memberID, dateOfViolation, nullified) VALUES ($memberID, CURDATE(), false);";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}

function incrementCopies($gameID){
    global $db;
    $sql = "UPDATE Game ";
    $sql .= "SET copies = copies + 1 ";
    $sql .= "WHERE gameID =  $gameID";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}



/**
 * Used to issue a ban in the case of a damaged return, and update the
 * amount due for a member && closing the rental
 * No incrementing of copies
 * @param $memberID, $amountDue, $gameID
 * @return $result
 */
function damagedReturn($memberID, $amountDue, $gameID, $rentalID){
    global $db;
    $sql1 = "UPDATE Member ";
    $sql1 .= "SET damageBan = true,  amountDue = $amountDue + ";
    $sql1 .= "(SELECT price FROM Game WHERE gameID = $gameID) WHERE memberID = $memberID";
    $result1 = mysqli_query($db,$sql1);
    confirm_result_set($result1);

    //close the rental
    $sql2 = "UPDATE Rental SET returned = true WHERE rentalID = $rentalID";
    $result2 = mysqli_query($db,$sql2);
    confirm_result_set($result2);
    return $result2;
}

/**
 * payback what is owed, which updates the members status
 * accordingly for damageBan attribute
 * @param $memberID
 * @return $result
 */
function payback($memberID){
    global $db;
    $sql = "UPDATE Member ";
    $sql .= "SET amountDue = 0, damageBan = false ";
    $sql .= "WHERE memberID = $memberID";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}


//function extension($memberID, $memberID){
//    global $db;
//    $sql = " UPDATE Rental ";
//    $sql .= "SET ";
//    $sql .= "returnDate = CASE WHEN (SELECT COUNT(extensions) FROM Rental WHERE (memberID = $memberID) < (SELECT ruleVal FROM Rules WHERE rule = 'numExtensions') THEN DATE_ADD(week, (SELECT ruleVal FROM Rules WHERE rule = 'extensionTime'), returnDate) END, ";
//    $sql .= "extensions = CASE WHEN (SELECT COUNT(extensions) FROM Rental WHERE (memberID = $memberID) < (SELECT ruleVal FROM Rules WHERE rule = 'numExtensions') THEN extensions = extensions +1  END ";
//    $sql .= "WHERE rentalID = $memberID";
//    $result = mysqli_query($db,$sql);
//    confirm_result_set($result);
//    return $result;
//}

/**
 * Create a rental, with memberID and gameID
 * Due date is set to whatever it is in the rules
 */
 function createRental($memberID, $gameID){
  global $db;
  $sql1 = "INSERT INTO Rental(gameID, memberID, returnDate, returned, extensions) ";
  $sql1 .= "VALUES ($gameID, $memberID, (SELECT DATE_ADD(CURDATE(), INTERVAL (SELECT ruleVal ";
  $sql1 .= "FROM Rules WHERE rule = 'rentalPeriod') WEEK)), false, 0)";
  $result1 = mysqli_query($db,$sql1);
     confirm_result_set($result1);
   //decrement the copies
  $sql2 = "UPDATE Game ";
  $sql2 .= "SET copies = copies -1 ";
  $sql2 .= "WHERE gameID =  $gameID";
  $result2 = mysqli_query($db,$sql2);
  confirm_result_set($result2);
  return $result2;
 }





