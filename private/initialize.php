<?php
/**
 * Created by PhpStorm.
 * User: k1763622
 * Date: 26/11/18
 * Time: 11:58
 */

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

//Assign the rool url to a PHP constant
$public_end = strpos($_SERVER['SCRIPT_NAME'],'/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define('WW_ROOT', $doc_root);

require_once('functions.php');
require_once('database.php');
require_once ('query_functions.php');

$db = db_connect();



?>