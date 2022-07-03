<?php

$id = $_GET['id_karoserije'];


include "./db/konekcija.php";
include "./entity/karoserije.php";
include "./entity/auta.php";

$auta = Auto::vratiSve($mysqli, " where a.id_karoserije =".$id);
$prikaz = '<table class="table" id="filtered">
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Cena</th>
                        <th>Godiste</th>
                        <th>Karoserije</th>
                </thead>    
                </tbody>';

    foreach($auta as $auto){
        $prikaz = $prikaz.'<tr>';
        $prikaz = $prikaz.'<td>'.$auto->naziv.'</td>';
        $prikaz = $prikaz.'<td>'.$auto->cena.'</td>';
        $prikaz = $prikaz.'<td>'.$auto->godiste.'</td>';
        $prikaz = $prikaz.'<td>'.$auto->karoserija->naziv_karoserije.'</td>';
        $prikaz = $prikaz.'</tr>';
    }
    $prikaz = $prikaz.'</tbody></table>';
    echo($prikaz);

?>