<?php

include "./db/konekcija.php";
include "./entity/karoserije.php";
include "./entity/auta.php";

$output ='';
$order = $_POST["order"];
$column_name = $_POST["column_name"];

if($order=='desc'){
    $order = 'asc';
}else{
    $order = 'desc';
}

$uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";

$auta = Auto::vratiSve($mysqli,$uslov);
$output.='
<table class="table">
<tbody>
    <tr>
        <th><a href="#" class="column-sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>
        <th><a href="#" class="column-sort" id="cena" data-order="'.$order.'" href="#">Cena</a></th>
        <th><a href="#" class="column-sort" id="godiste" data-order="'.$order.'" href="#">Godiste</a></th>
        <th>Karoserija</th>
        <th>Opcije</th>
    </tr>

';
foreach($auta as $auto){
    $output = $output.'<tr>';
    $output = $output.'<td>'.$auto->naziv.'</td>';
    $output = $output.'<td>'.$auto->cena.'</td>';
    $output = $output.'<td>'.$auto->godiste.'</td>';
    $output = $output.'<td>'.$auto->karoserija->naziv_karoserije.'</td>';
    $output = $output.'<td><a href="obrisi.php?id='.$auto->id_auta.'">
    <img src="./images/trash.png" alt="" class="icon-images" width="20px" height="20px">
    </a>
    <a href="izmeni.php?id='.$auto->id_auta.'">
<img src="./images/refresh.png" alt="" class="icon-images" width="20px" height="20px">
</a>
</td>';
    $output = $output.'</tr>';
}
$output .='</tbody></table>';
echo $output;
?>