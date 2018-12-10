<?php

function update_nullification(){
    global $db;
    $sql2 = "SELECT ruleVal FROM Rules WHERE rule = 'gracePeriod'";
    $sql = "UPDATE Violates SET nullified = true WHERE DATEDIFF(CURDATE(), dateOfViolation) > 7*($sql2)";
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

function insert_games($gameName, $price, $copies,$URL,$age,$platform){
    global $db;

    $stmt = $db->prepare("INSERT INTO Game (gameName, price, copies,URL,age,platform)  VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("siisss", $gameName, $price, $copies,$URL,$age,$platform);
    $stmt->execute();
    return "in";
}

function change_rule($ruleName, $newRuleVal){
  global $db;
  $sql = "UPDATE Rules SET ruleVal = '$newRuleVal' WHERE rule = '$ruleName'";
  return isset($sql);
}
?>
