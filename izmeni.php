<!DOCTYPE html>
<?php

include "./db/konekcija.php";
include "./entity/auta.php";
include "./entity/karoserije.php";

$id = $_GET["id"];

$auto=Auto::vratiSve($mysqli," where a.id_auta=".$id);
$karoserija = Karoserija::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    $godiste = $_POST['godiste'];
    $karoserija = $_POST['karoserija'];

    $mysqli->query("UPDATE auta SET naziv = '$naziv', cena='$cena',godiste='$godiste', id_karoserije ='$karoserija' WHERE id_auta = $id");
    header('Location:salon.php');
}

?>
<html>

<head>
    <?php
    include("header.php");
    ?>
    <title>Izmena predstave</title>
</head>
<body>
    <div class="background-image"></div>
    <div class="row form-container" id="update-form">
    <div class="update">
    <form action="" role="form" method="post">
        <label for="naziv">Naziv</label>
        <input type="text" name="naziv" id="naziv" value="<?php echo $auto[0]->naziv;?>"class="izmena">
        <label for="cena">Cena</label>
        <input type="text" name="cena" id="cena" value="<?php echo $auto[0]->cena?>"class="izmena">
        <label for="godiste">Godiste</label>
        <input type="text" name="godiste" id="godiste" value="<?php echo $auto[0]->godiste?>"class="izmena">
        <label for="Karoserija">Karoserija</label>
        <select name="karoserija" id="karoserija" class="izmena">
            <?php foreach($karoserija as $k):?>
                <option value="<?php echo $k->id_karoserije;?>">
                <?php echo $k->naziv_karoserije;?>
                </option>
                <?php endforeach; ?>
        </select>
        <div class="form-group">
            <button type="submit" id="update" name="update" class="btn-round-custom">Sacuvaj izmene</button>
        </div>
    </form>
    </div>
    
    </div>
</body>

</html>