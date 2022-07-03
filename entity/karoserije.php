<?php 

class Karoserija{
    public $id_karoserije;
    public $naziv_karoserije;


    public function __construct($id_karoserije, $naziv_karoserije)
    {
        $this->id_karoserije = $id_karoserije;
        $this->naziv_karoserije = $naziv_karoserije;
    }
    public static function vratiSve($db){
        $query = "SELECT * FROM karoserije";
        $result = $db->query($query);
        $array = [];
        while($r=$result->fetch_assoc()){
            $karoserija = new Karoserija($r['id_karoserije'],$r['naziv_karoserije']);
            array_push($array, $karoserija);
        }
        return $array;
    }
}




?>