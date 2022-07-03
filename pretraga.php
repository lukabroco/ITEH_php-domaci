<!DOCTYPE html>

<?php

include "./db/konekcija.php";
include "./entity/karoserije.php";
include "./entity/auta.php";

$karoserije = Karoserija::vratiSve($mysqli);

?>

<html>

<head>
    <?php
    include("header.php");
    ?>
    <title>Pretraga automobila</title>
    <script>
        function find() {
            var pretraga = $("#karoserija").val();
            $.ajax({
                url: "pretragaStrana.php",
                data: "id_karoserije=" + pretraga,
                success: function(auta) {
                    $('#output').html(auta);
                },
            });
        }
    </script>
    
</head>

<body>
    <div class="background-image"></div>
    <div class="form">
        <form action="" method="POST" role="form" class="pretraga">
            <div class="label">
                <label for="karoserija">Karoserija</label>
            </div>
            <div class="select-div">
                <select name="karoserija" id="karoserija">
                    <?php foreach ($karoserije as $k) : ?>
                        <option value="<?php echo $k->id_karoserije; ?>">
                            <?php echo $k->naziv_karoserije; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="button" id="btn-find" name="pronadji" class="btn-round-custom" onclick="find()">Pronadji</button>
            </div>


        </form>

    </div>

    <div class="output" id="output"></div>


</body>

</html>
<script>
     const pronadji = document.getElementById("btn-find");
     const output = document.getElementById("output");
     const forma = document.querySelector('.form');
     


     pronadji.addEventListener('click', function() {
         output.className = 'output-visible';
         forma.style.borderRadius = "30px 30px 0px 0px";
     });
     
    
</script>