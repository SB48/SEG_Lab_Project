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
 * @param $rentalID
 * @return $result
 */
function normalReturn($rentalID){
    closeTheRental($rentalID);
    incrementCopies($rentalID);
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
    $sql = "INSERT INTO Violates (memberID, dateOfViolation, nullified) VALUES ($memberID, CURDATE(), false)";
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
function damagedReturn($memberID, $amountDue, $gameID){
    global $db;
    $sql = "UPDATE Member ";
    $sql .= "SET damageBan = true,  amountDue = $amountDue + ";
    $sql .= "(SELECT price FROM Game WHERE gameID = $gameID) WHERE memberID = $memberID";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
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


function extension($rentalID, $memberID){
    global $db;
    $sql = "UPDATE Rental
        SET (returnDate, extensions) = IF (SELECT COUNT(extensions)
                              FROM Rental WHERE (memberID = $memberID) < (SELECT ruleVal FROM Rules WHERE rule = 'numExtensions'),
                                      (SELECT DATE_ADD(returnDate, INTERVAL (SELECT ruleVal FROM Rules
                                          WHERE rule = 'extensionTime';) WEEK ), extensions +1 ), (returnDate, extensions)
          WHERE rentalID = $rentalID)";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}

function decrementCopies($gameID){
    global $db;
    $sql = "UPDATE Game ";
    $sql .= "SET copies = copies -1 ";
    $sql .= "WHERE gameID =  $gameID";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Create a rental, with memberID and gameID
 * Due date is set to whatever it is in the rules
 */
 function createRental($memberID, $gameID){
  global $db;
  $sql = "INSERT INTO Rental(gameID, memberID, returnDate, returned, extensions) VALUES ($gameID, $memberID, DATE_ADD(weeks,
    SELECT ruleVal FROM Rules WHERE rule = 'rental period' , CURDATE()) , false, 0)";
  decrementCopies($gameID);
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
 }
