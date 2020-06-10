<?php

namespace app\Instrument;

use app\DB\Iorm;
use app\DB\Torm;
use PDO;

class Instrument implements Iorm{
    use Torm;
    static public  $table_name = 'Instrumente';
    static public $pkName = 'Instument_ID';
    public $Instument_ID;
    public $Instrument;


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
        $this->Instument_ID = $data['Instument_ID'];
        $this->Instrument = $data['Instrument'];

   }
}