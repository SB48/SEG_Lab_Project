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


function insert_games($gameName, $price, $copies,$PURL,$RURL,$age,$platform){
    global $db;
    $sql = "INSERT INTO Game (name, price, copies, purl,rurl, ageRating, platform)  VALUES ('$gameName','$price','$copies','$PURL','$RURL','$age', '$platform')";
    $content = file_get_contents($PURL);
    echo $sql;
    $fp = fopen("public/pictures", "w");
    fwrite($fp, $content);
    fclose($fp);
    $res = mysqli_query($db, $sql);
    return $res;
}



function change_rule($ruleName, $newRuleVal){
  global $db;
  $sql = "UPDATE Rules SET ruleVal = '$newRuleVal' WHERE rule = '$ruleName'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
?>
