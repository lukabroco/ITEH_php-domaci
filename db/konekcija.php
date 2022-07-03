<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "salon";
$mysqli = new mysqli($server, $user, $password, $db);
if($mysqli->connect_errno){
    echo "Konekcija neuspesna", $mysqli->connect_error;
    exit();
}
$mysqli->set_charset("utf8");
?>