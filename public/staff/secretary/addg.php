
<?php
$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');
if (!$mysqli)
{
    die('Could not connect: ' .$mysqli->connect_error());
}

$mysqli->select_db("my_db");

$sql="INSERT INTO Game (name, ageRating,genre,url,platform)
VALUES
('$_POST[name]','$_POST[price]','$_POST[copies]','$_POST[URL]','$_POST[age]','$_POST[platform]')";

if (!$mysqli->query($sql))
{
    die('Error: ' .$mysqli->error());
}
echo "1 record added";

$mysqli->close()
?>

