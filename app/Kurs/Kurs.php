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



}