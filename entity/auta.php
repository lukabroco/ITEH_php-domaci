<?php
class Auto{
    public $id_auta;
    public $naziv;
    public $cena;
    public $godiste;
    public $karoserija;

    public function __construct($id_auta, $naziv, $cena, $godiste, $karoserija)
    {
        $this->id_auta =$id_auta;
        $this->naziv =$naziv;
        $this->cena =$cena;
        $this->godiste =$godiste;
        $this->karoserija =$karoserija;
    }
    public function ubaciAuto($data, $db){
        if($data['naziv'] ==='' || $data['cena'] ==='' || $data['godiste']==='') {
            $this->poruka ='Polja moraju biti popunjena';
        }else{
            $save = $db->query("INSERT INTO auta(naziv,cena,godiste,id_karoserije) VALUES ('".$data['naziv']."','".$data['cena']."','".$data['godiste']."','".$data['id_karoserije']."')") or die($db->error);
            if($save){
                $this->poruka = "Uspesno sacuvan auto";
            }else{
                $this->poruka ="Neuspesno sacuvan auto";
            }
        }
    }
    public function getPoruka(){
        return $this->poruka;
    }
    public static function vratiSve($db, $uslov){
        $query="SELECT * FROM auta a JOIN karoserije k ON a.id_karoserije=k.id_karoserije".$uslov;
		$query=trim($query);
        $result=$db->query($query) or die($db->error);
        $array=[];
        while($r = $result->fetch_assoc()){
			$karoserija=new Karoserija($r['id_karoserije'],$r['naziv_karoserije']);
			$auto=new Auto($r['id_auta'],$r['naziv'],$r['cena'],$r['godiste'],$karoserija);
            array_push($array,$auto);
            }
        return $array;
    }
}
?>