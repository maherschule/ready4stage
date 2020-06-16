<?php

namespace app\Raum;

use app\DB\Iorm;
use app\DB\Torm;
use PDO;

class Raum implements Iorm{
    use Torm;
    static public  $table_name = 'Raum';
    static public $pkName = 'Raum_ID';
    public $Raum_ID;
    public $Raumnr;

    public function __construct(){
        $args = func_get_args();
        if($args){
            $isPdo = $args[0] instanceof PDO;
            if($isPdo) $this->db = $args[0];
            if(isset($args[1]) && is_array($args[1]) && !empty($args[1])){
                $this->apply($args[1]);
            }
        }


        return $this;
    }

    public function apply($data = []){
        $this->Instument_ID = $data['Instument_ID'];
        $this->Instrument = $data['Instrument'];

   }


   public function addRaumEignung($raumid, $instument_ID){
       $raumid = intval($raumid);
       $instument_ID = intval($instument_ID);
       $query = "INSERT INTO `".DBNAME."`.`Raumseignung` (`Raumseignung_ID`, `Raum_ID`, `Instrument_ID`)
                    VALUE
                    (NULL, ?,?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $raumid,
            $instument_ID
        ]);
        $error_code = $stmt->errorCode();
        return $error_code === "00000";
    }
    public function deleteRaumsEignung($raumid){

        $raumid = intval($raumid);
        $query = "DELETE FROM `".DBNAME."`.`Raumseignung` WHERE Raum_ID = ? ;";
 
         $stmt = $this->db->prepare($query);
         $stmt->execute([$raumid]);
         $error_code = $stmt->errorCode();
         return $error_code === "00000";
     }
    
    public function getRaumsEignung($raumid){
        $id = intval($raumid);
        $query = "SELECT r.Instrument_ID, i.Instrument FROM `".DBNAME."`.`Raumseignung` as r right JOIN `".DBNAME."`.`Instrumente` as i  USING (Instrument_ID) WHERE Raum_ID = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $error_code = $stmt->errorCode();
        $result = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[$row['Instrument_ID']] = $row['Instrument'];
        }

        return $result;
     }
}