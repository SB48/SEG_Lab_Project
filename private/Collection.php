<?php>

//$db = db_connect();

//$connection = $mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//should be separate but wasn't sure if this file had been created or not


//age rating less than 12
$ageUnder12 = "SELECT * from Game ";
$ageUnder12 .= "WHERE ageRating='PG' OR ageRating='3' OR ageRating='7'";
$ageUnder12_set = mysqli_query($db, $ageUnder12);
//age rating less than 18
$ageUnder18 = "SELECT * from Game ";
$ageUnder18 .= "WHERE ageRating='PG' OR ageRating='3' ";
$ageUnder18 .= "OR ageRating='7' ageRating='12' OR ageRating='16' ";
$ageUnder18 .= "OR ageRating='16' ageRating='12'";
$ageUnder18_set = mysqli_query($db, $ageUnder18);
//age rating more than + equals to 18
$ageOver18 = "SELECT * from Game ";
$ageOver18 .= "WHERE ageRating='18'";
$ageOver18_set = mysqli_query($db, $ageOver18);
//PC platform
$pc = "SELECT * from Game ";
$pc .= "WHERE platform='PC'";
$pc_set = mysqli_query($db, $pc);
//XBOX platform
$xbox = "SELECT * from Game ";
$xbox .= "WHERE platform='XBOX'";
$xbox_set = mysqli_query($db, $xbox);
//PS4 platform
$ps4 = "SELECT * from Game ";
$ps4 .= "WHERE platform='PS4'";
$ps4_set = mysqli_query($db, $ps4);
//all available games
$availableGames = "SELECT * from Game ";
$availableGames .= "WHERE copies>0";
$availableGames_set = mysqli_query($db, $availableGames);
//price
$priceAsc = "SELECT * from Game ";
$priceAsc .= "ORDER BY price ASC";
$priceAsc_set = mysqli_query($db, $priceAsc);

mysqli_free_result($ageUnder12_set);
mysqli_free_result($ageUnder18_set);
mysqli_free_result($ageOver18_set);
mysqli_free_result($pc_set);
mysqli_free_result($xbox_set);
mysqli_free_result($ps4_set);
mysqli_free_result($availableGames_set);
mysqli_free_result($priceAsc_set);


db_disconnect();

?>