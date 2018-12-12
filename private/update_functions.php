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
    $stmt = $db->prepare("INSERT INTO Game (name, price, copies, purl,rurl, ageRating, platform)  VALUES (?, ?,?, ?, ?, ?, ?)");
    $stmt->bind_param("siissss", $gameName, $price, $copies, $PURL,$RURL, $age, $platform);
    $content = file_get_contents($PURL);
    $fp = fopen("public/pictures", "w");
    fwrite($fp, $content);
    fclose($fp);
    $stmt->execute();
    return "ss";
}


function change_rule($ruleName, $newRuleVal){
  global $db;
  $sql = "UPDATE Rules SET ruleVal = '$newRuleVal' WHERE rule = '$ruleName'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
?>
