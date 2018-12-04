
<?php
global $db;
$sql="INSERT INTO Game (name, ageRating,genre,url,platform)
VALUES
('$_POST[name]','$_POST[price]','$_POST[copies]','$_POST[URL]','$_POST[age]','$_POST[platform]')";

?>
