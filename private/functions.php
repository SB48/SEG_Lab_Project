<?php
/**
 * Created by PhpStorm.
 * User: k1763622
 * Date: 26/11/18
 * Time: 11:59
 */
function url_for($script_path){
    if($script_path[0] != '/'){
        $script_path = '/' + $script_path;
    }
    return WW_ROOT . $script_path;
}
?>