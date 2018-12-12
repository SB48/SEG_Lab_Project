<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/shared/header.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["gameName"])) {
        $gameName=$_POST['gameName'];
        $price=$_POST['price'];
        $copies=$_POST['copies'];
        $PURL=$_POST['PURL'];
        $RURL=$_POST['RURL'];
        $age=$_POST['age'];
        $platform=$_POST['platform'];
        $result = insert_games($gameName, $price, $copies, $PURL,$RURL, $age, $platform);
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }
}

?>

?>
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
                        <a class="dropdown-item" href="#">About</a>
                        <a class="dropdown-item" href="education.html">Education</a>
                        <a class="dropdown-item" href="career.html">Career</a>
                        <a class="dropdown-item" href="skills.html">Skills</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Add Game</h1>
        </div>
        <div class="col-md-3">
            <div class="center">
</div></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
        <div  action="collection_add_game.php" method="post">
            <div id="loginDiv">
                <div class="loginSmallDiv" id="loginSmallDiv">
                    <div class="loginInput "style="padding-left: 35px">

                        <input type="text" placeholder="GameName" name="gameName" id="gameName">
                    </div>
                    <div class="loginInput "style="padding-left: 35px">
                        <input type="text" placeholder="Price" name="price" id="price">
                    </div>
                    <div class="loginInput "style="padding-left: 35px">

                        <input type="text" placeholder="Copies" name="copies" id="copies">
                    </div>
                     <div class="loginInput "style="padding-left: 35px">

                        <input type="url" placeholder="Picture URL" name="PURL" id="PURL">
                    </div>
                    <div class="loginInput "style="padding-left: 35px">

                        <input type="url" placeholder=" Rating URL" name="RURL" id="RURL">
                    </div>
                    <div class="loginInput "style="padding-left: 35px">
                        <select name="age" id="age" class="custom-select sources left" placeholder="Source Type">
                            <option value="PG">PG</option>
                            <option value="3">3</option>
                            <option value="7">7</option>
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                    <div class="loginInput "style="padding-left: 35px">
                        <select name="platform" id="platform" class="custom-select sources left" placeholder="Source Type">
                            <option value="PS">PS</option>
                            <option value="PS3">PS3</option>
                            <option value="PS4">PS4</option>
                            <option value="XBOX360">XBOX360</option>
                            <option value="XBOXONE">XBOXONE</option>
                            <option value="Switch">Switch</option>
                            <option value="3DS">3DS</option>
                            <option value="PC">PC</option>
                        </select>
                    </div>
                    <br/>
                    <br/>
                   <input style="float: right;margin-left: 33px" type="submit" value="Submit">
                </div>
            </div>
        </div>
        </form>

            </div></div></div>
    </div>




    <div class="row py-5">
        <div class="col-md-12"></div>
    </div>
    <div class="row py-5">
        <div class="col-md-12"></div>
    </div>
    <div class="row py-5">
        <div class="col-md-12"></div>
    </div>
<?php require_once('../../../private/shared/footer.php'); ?>
