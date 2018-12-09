
<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/shared/header.php'); ?>



<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CGS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="home_page.php">Home</a>
                        <a class="dropdown-item" href="collection.html">Collection</a>
                        <a class="dropdown-item" href="login.html">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Collection</h1>
        </div>
        <div class="col-md-3">
            <div class="center">
    <select name="sources" id="sources" class="custom-select sources" placeholder="Source Type" onchange="window.location='collection.php?id='+ value;">
    <option value="all">All</option>
    <option value="available">Available</option>
    <option value="under12">under12</option>
    <option value="under18">under18</option>
    <option value="18">18+</option>
    <option value="pc">PC</option>
    <option value="xbox">XBOX</option>
    <option value="ps4">PS4</option>
  </select>
</div></div>
    </div>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css/main_body.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<?php
if( defined('id')){$games_set = availableGames();}
else{
    $sort = $_GET['id'];
    if($sort == "available") {$games_set = availableGames();}
    else if($sort == "under12") {$games_set = ageUnder12();}
    else if($sort == "under18") {$games_set = ageUnder18();}
    else if($sort == "18") {$games_set = ageOver18();}
    else if($sort == "pc") {$games_set = pc();}
    else if($sort == "xbox") {$games_set = xbox();}
    else if($sort == "ps4") {$games_set = ps4();}
    else {$games_set = availableGames();}
}
while($eachGame = mysqli_fetch_assoc($games_set)) {
    ?>
    
    <div class="categoryPageDiv">
        <div class="categoryProducts">
            <div class="productUnit">
                <div class="productUnitFrame">
                    <a href="product.php?id=<?php echo $eachGame["gameID"]; ?>">
                        <?php echo '<img src="'.$eachGame["path"]. '" width="100px" class="productImage">' ?>
                    </a>
                    <a href="product.php?id=<?php echo $eachGame["gameID"]; ?>" class="productLink">
                        <?php printf ($eachGame["name"]);?>
                    </a>
                    <span class="rentPrice">
                        <span class="price ">Price:
                        <?php printf ($eachGame["price"]);?></span>
                    </span>
                    <div class="show1 productInfo">
                        <span class="category ">Genre: <span class="productcategory"><?php printf ($eachGame["genre"]);?></span></span>
                        <span class="productStatus st">Copies:<br><span class="productStatusResult"><?php printf ($eachGame["copies"]);?></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php   
}

?>

<div style="clear:both"></div>
<div>
</div>

<?php require_once(SHARED_PATH . '/footer.php'); ?>




