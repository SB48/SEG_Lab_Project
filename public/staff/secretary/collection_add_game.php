<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(SHARED_PATH . '/header.php'); ?>
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
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">GameName</span>
                        </div>
                        <input type="text" name="gameName" id="gameName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                        </div>
                        <input type="text" name="price" id="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Copies</span>
                        </div>
                        <input type="text"name="copies" id="copies"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Picture Url</span>
                        </div>
                        <input type="text" class="form-control" id="PURL" aria-describedby="basic-addon3"name="PURL">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Rating Url</span>
                        </div>
                        <input type="text" class="form-control" id="RURL" aria-describedby="basic-addon3"name="RURL">
                    </div>
                    <div class="loginInput "style="padding-left: 35px">
                        <select name="age" id="age" class="custom-select custom-select-lg mb-3" placeholder="Source Type">
                            <option value="PG">PG</option>
                            <option value="3">3</option>
                            <option value="7">7</option>
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                    <div class="loginInput "style="padding-left: 35px">
                        <select name="platform" id="platform" class="custom-select custom-select-lg mb-3" placeholder="Source Type">
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
                    <button type="submit" value="Submit" class="btn btn-danger" style="float: right;">Submit</button>
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
<?php require_once(SHARED_PATH . '/footer.php'); ?>
