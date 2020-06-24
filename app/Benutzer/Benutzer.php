<?php
namespace app\Benutzer;

use app\DB\DB;
use app\DB\Iorm;
use app\DB\Torm;
use PDO;

class Benutzer implements Iorm{
    use Torm;
    static public  $table_name = 'Benutzer';
    static public $pkName = 'Benutzer_ID';
    public $Benutzername;
    private $Benutzer_Passwort;
    public $Benutzerrole;
    public $Benutzer_Email;

    /**
     * @var PDO
     */
    private $db;


    public function __construct($data = []){
        $this->db  = DB::connect(); 
        $args = func_get_args();
        if($data){
            if(isset($data) && is_array($data) && !empty($data)){
                $this->apply($data);
            }
        }
        return $this;
    }

    public function apply($data = []){
        $this->Benutzername = $data['Benutzername'];
        $this->Benutzer_Passwort = $data['Benutzer_Passwort'];
        $this->Benutzerrole = $data['Benutzerrole'];
        $this->Benutzer_Email = $data['Benutzer_Email'];
        return $this;
   }


    public function getVerwalter(){
        $users = $this->get();
        $return = [];
        foreach($users as $user){
            if($user['Benutzerrole'] !== 'Verwalter') continue;
            $return[] = $user;
        }
        return $return;
    }
}