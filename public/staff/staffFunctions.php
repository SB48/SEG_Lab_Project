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
 */
function normalReturn($rentalID){
    "UPDATE Rental 
        SET returned = true 
          WHERE rentalID = $rentalID";
    "UPDATE Game 
           SET copies = copies + 1 
               WHERE gameID = (SELECT gameID FROM Rental WHERE rentalID = $rentalID)";
}

/**
 * Used to issue a ban in the case of a damaged return, and update the
 * amount due for a member
 * @param $rentalID
 */
function damagedReturn($rentalID){
    "UPDATE Member 
              SET damageBan = true,  amountDue = amountDue + 
                  (SELECT price FROM Game WHERE gameID = (
                      SELECT gameID FROM Rental WHERE rentalID = $rentalID);),
                    banBeginDate = IF (banBeginDate IS NULL, CURDATE(), banBeginDate)   
                WHERE memberID = (SELECT memberID FROM Rental WHERE rentalID = $rentalID)";
}

/**
 * payback what is owed, which updates the members status
 * accordingly for damageBan attribute
 * @param $memberID
 */
function payback($memberID){
    "UPDATE Member 
                  SET amountDue = 0, damageBan = false    
                    WHERE memberID = $memberID";
}