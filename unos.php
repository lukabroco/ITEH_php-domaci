<?php


include "./db/konekcija.php";
include "./entity/karoserije.php";
include "./entity/auta.php";


$karoserija = Karoserija::vratiSve($mysqli);



if (isset($_POST['dodaj'])) {
    $naziv = trim($_POST['naziv']);
    $cena = trim($_POST['cena']);
    $godiste = trim($_POST['godiste']);
    $karoserija = $_POST['karoserija'];


    $data = array(
        "naziv" => $naziv,
        "cena" => $cena,
        "godiste" => $godiste,
        "id_karoserije" => $karoserija,
    );
    $auto = new Auto(null, $naziv, $cena, $godiste, $karoserija);
    $auto->ubaciAuto($data, $mysqli);
    $auto = $auto->getPoruka();
    header('Location: unos.php');
}

?>
<html>

<head>
    <?php
    include("header.php");
    ?>
    <title>Unos novog auta</title>
</head>

<body>
    <div class="background-image"></div>
    <div class="container">
        <div id="insert-form">
            <form action="" name="unosAuta" onsubmit="return validateForm()" method="post">
                <div class="input-form">
                    <label for="naziv">Naziv auta</label>
                    <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Unesite naziv auta">
                </div>
                <div class="input-form">
                    <label for="cena">Cena</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu auta">
                </div>
                <div class="input-form">
                    <label for="godiste">Godiste</label>
                    <input type="number" class="form-control" name="godiste" id="godiste" placeholder="Unesite godiste auta">
                </div>
                <div class="input-form">
                    <label for="karoserija">Karoserija</label>
                    <select name="karoserija" class="select">
                        <?php
                        foreach ($karoserija as $k) : ?>
                            <option value="<?php echo $k->id_karoserije; ?>">
                                <?php echo $k->naziv_karoserije; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-form" id="btninpt">
                    <button type="submit" id="dodaj" name="dodaj" class="btn">Dodaj</button>
                </div>


            </form>
        </div>
    </div>
</body>

</html>