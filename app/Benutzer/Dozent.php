<?php
namespace app\Benutzer;

use app\DB\Iorm;
use app\DB\Torm;
use PDO;

class Dozent implements Iorm{
    use Torm;
    static public  $table_name = 'Dozent';
    static public $pkName = 'Dozent_ID';
    public $Dozent_ID;
    public $Vorname;
    public $Nachname;
    public $Geburtsort;
    public $Gebutsdatum;
    public $Strasse;
    public $Hausnr;
    public $Email;
    public $Telefonnummer;
    public $IBAN;
    public $Stundensatz;
    public $Benutzername;
    private $Benutzer_Passwort;
    public $Benutzerrole;
    public $Benutzer_Email;
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

        return $this;
    }

    public function apply($data = []){
        $this->Dozent_ID = $data['Dozent_ID'];
        $this->Vorname = $data['Vorname'];
        $this->Nachname = $data['Nachname'];
        $this->Geburtsort = $data['Geburtsort'];
        $this->Geburtsdatum = $data['Gebutsdatum'];
        $this->Strasse = $data['Strasse'];
        $this->Hausnr = $data['Hausnr'];
        $this->Email = $data['Email'];
        $this->Telefonnummer = $data['Telefonnummer'];
        $this->IBAN = $data['IBAN'];
   }

}