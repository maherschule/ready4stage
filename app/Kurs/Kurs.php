<?php

namespace app\Kurs;

use app\DB\Iorm;
use app\DB\Torm;
use PDO;

class Kurs implements Iorm{
    use Torm;
    static public  $table_name = 'Kurs';
    static public $pkName = 'Kurs_ID';
    public $Kurs;
    public $Kursart;
    public $Dozent_ID;
  
    /**
     * @var PDO
     */
    private $db;
    public function __construct(){
        $args = func_get_args();
        if($args){
            $isPdo = $args[0] instanceof PDO;
            if($isPdo) $this->db = $args[0];
            if(isset($args[1]) && is_array($args[1]) && !empty($args[1])){
                $this->apply($args[1]);
            }
        }
    }

    public function apply($data = []){
        $this->Kurs = $data['Kurs'];
        $this->Kursart = $data['Kursart'];
        $this->Dozent_ID = $data['Dozent_ID'];
   }

   public function getKursDozent($id){
       $id = intval($id);
       $query = "SELECT b.* FROM `".DBNAME."`.`Benutzer` as b WHERE Benutzer_Email = (";
       $query .= "SELECT d.Email FROM Kurs as k RIGHT JOIN Dozent as d USING(Dozent_ID) WHERE Dozent_ID = :id) LIMIT 1";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
   
       return $result;
   }

   public function getKursSchueler($id){
       $id = intval($id);
       $query = "SELECT * FROM `".DBNAME."`.`Kursschueler` WHERE Kurs_ID = :id";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}