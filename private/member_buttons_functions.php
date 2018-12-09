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
    $sql = "UPDATE Rental 
            SET returned = true 
            WHERE rentalID = $rentalID";
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

function incrementCopies($rentalID){
    global $db;
    $sql = "UPDATE Game 
           SET copies = copies + 1 
               WHERE gameID = (SELECT gameID FROM Rental WHERE rentalID = $rentalID)";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Used to issue a ban in the case of a damaged return, and update the
 * amount due for a member && closing the rental
 * No incrementing of copies
 * @param $rentalID
 * @return $result
 */
function damagedReturn($rentalID){
    global $db;
    $sql = "UPDATE Member 
              SET damageBan = true,  amountDue = amountDue + 
                  (SELECT price FROM Game WHERE gameID = (
                      SELECT gameID FROM Rental WHERE rentalID = $rentalID);),
                    banBeginDate = IF (banBeginDate IS NULL, CURDATE(), banBeginDate)   
                WHERE memberID = (SELECT memberID FROM Rental WHERE rentalID = $rentalID)";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    closeTheRental($rentalID);
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
    $sql = "UPDATE Member 
                  SET amountDue = 0, damageBan = false    
                    WHERE memberID = $memberID";
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
          WHERE rentalID = $rentalID";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}