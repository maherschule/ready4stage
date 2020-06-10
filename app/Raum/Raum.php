<?php

namespace app\Raum;

use app\DB\Iorm;
use app\DB\Torm;


class Raum implements Iorm{
    use Torm;
    static public  $table_name = 'Raum';
    static public $pkName = 'Raum_ID';
    public $Raum_ID;
    public $Raumnr;

    public function __construct(\PDO $db, $data = array()){
        $this->db = $db;   
        if(count($data)){
            $this->apply($data);
        }
    }

    public function apply($data = []){
        $this->Instument_ID = $data['Instument_ID'];
        $this->Instrument = $data['Instrument'];

   }


   public function addRaumEignung($instument_ID){
       $query = "INSERT INTO `".DBNAME."`.`".Static::$table_name."`(Raumseignung_ID, Raum_ID, Instrument_ID)
                    VALUES
                    (NULL, ?,?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $this->Raum_ID,
            $instument_ID
        ]);
        $error_code = $stmt->errorCode();
        return $error_code === "00000";
    }

}