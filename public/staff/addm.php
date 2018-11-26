
<?php
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');
if (!$mysqli)
{
    die('Could not connect: ' .$mysqli->connect_error());
}

$mysqli->select_db("my_db");

$sql="INSERT INTO Member(firstName, lastName,dob)
VALUES
('$_POST[FirstName]','$_POST[SurName]','$_POST[bday]')";

if (!$mysqli->query($sql))
{
    die('Error: ' .$mysqli->error());
}
echo "1 record added";

$mysqli->close()
?>
