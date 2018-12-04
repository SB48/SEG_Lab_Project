
<?php
global $db;
$sql="INSERT INTO Member(firstName, lastName,dob)
VALUES
('$_POST[FirstName]','$_POST[SurName]','$_POST[bday]')";
?>
