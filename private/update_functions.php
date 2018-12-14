<?php

function update_nullification(){
    global $db;
    $sql = "UPDATE Violates SET nullified = true WHERE DATEDIFF(CURDATE(), dateOfViolation) ";
    $sql .= "> 7*(SELECT ruleVal FROM Rules WHERE rule = 'gracePeriod')";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function insert_member($firstname, $lastname, $dob){
    global $db;
    $stmt = $db->prepare("INSERT INTO Member (firstName, lastName, dob)  VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $dob);
    $stmt->execute();
    return "ELO";
}


function insert_games($gameName, $price, $copies, $RURL, $PURL, $age,$platform){
    global $db;
    $stmt =$db->prepare("INSERT INTO Game (name, price, copies, url, path, ageRating, platform)  VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("siissss", $gameName, $price, $copies, $RURL, $PURL, $age,$platform);
    $stmt->execute();
    return "success";
}



function change_rule($ruleName, $newRuleVal){
  global $db;
  $sql = "UPDATE Rules SET ruleVal = '$newRuleVal' WHERE rule = '$ruleName'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
?>
