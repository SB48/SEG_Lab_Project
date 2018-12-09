<?php

function update_nullification(){
    global $db;
    $sql2 = "SELECT ruleVal FROM Rules WHERE rule = 'gracePeriod'";
    $sql = "UPDATE Violates SET nullified = true WHERE DATEDIFF(CURDATE(), dateOfViolation) > 7*($sql2)";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

?>