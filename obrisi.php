<?php
include "./db/konekcija.php";

$id = $_GET['id'];
$sql = "DELETE FROM auta WHERE id_auta='".$id."'";
$mysqli->query($sql) or die($sql);

header("Location:salon.php");
?>