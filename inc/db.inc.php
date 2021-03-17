<?php

//require_once('test.php');

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "game");

function getDbConnection() {
  static $con;
	if ( $con ) return $con; // Reuse existing connection
  
  try {
    $con = new PDO('mysql:host='.HOST.';charset=utf8;dbname='.DBNAME, USER, PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } 
  catch (Exception $e)
  { 
    die('Caught exception: '.  $e->getMessage());
  }

return $con;
}

?>