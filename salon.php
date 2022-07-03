<!DOCTYPE html>
<?php

include "./db/konekcija.php";
include "./entity/karoserije.php";
include "./entity/auta.php";

$order = '';
$auta = Auto::vratiSve($mysqli,$order);

?>

<html>

    <head>
        <?php
        include('header.php');
        ?>

        <title>Salon</title>
        <link rel="stylesheet" href="/styles/main.css">
    </head>
    <body>
        <div class="background-image"></div>
            <div class="table-responsive" id="tabela-automobila">
                <table class="table">
                    <thead>
                        <tr>
                            <th><a href="#" class="column-sort" id="naziv" data-order="desc" href="#">Naziv</a></th>
                            <th><a href="#" class="column-sort" id="cena" data-order="desc" href="#">Cena</a></th>
                            <th><a href="#" class="column-sort" id="godiste" data-order="desc" href="#">Godiste</a></th>
                            <th>Karoserija</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($auta as $auto):
                        ?>
                        <tr>
                            <td><?php echo $auto->naziv;?></td>
                            <td><?php echo $auto->cena;?></td>
                            <td><?php echo $auto->godiste;?></td>
                            <td><?php echo $auto->karoserija->naziv_karoserije;?></td>
                            <td><a href="obrisi.php?id=<?php echo $auto->id_auta;?>">
                        <img src="images/trash.png" alt="" class="icon-images" width="20px" height="20px">
                        </a>
                        <a href="izmeni.php?id=<?php echo $auto->id_auta;?>">
                    <img src="images/refresh.png" alt="" class="icon-images" width="20px" height="20px">
                    </a>
                    </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                 </table>
         </div>

    </body>
    
</html>
<script>
    $(document).ready(function(){
        $(document).on('click','.column-sort',function(){
            var column_name = $(this).attr("id");
            console.log(column_name);
            var order = $(this).data("order");
            console.log(order);
            var arrow ='';

            if(order=='desc'){
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>'; 
            }else{
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
            }
          $.ajax({
            url: "sortiraj.php",
            method: "POST",
            data: {column_name:column_name, order:order},
            success:function(data){
                $('#tabela-automobila').html(data);
                $('#'+column_name+'').append(arrow);
            }
          });
        });
    });
</script>