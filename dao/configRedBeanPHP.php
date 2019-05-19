<?php

/*
 * @autor A66 
 */

$user = "root";
$pass = "123";
$host = "localhost";
$dbname = "contable";
$serverAndDB = "mysql:host=" . $host . ";dbname=" . $dbname;
require_once('rb.php');
R::setup($serverAndDB, $user, $pass);
?>
