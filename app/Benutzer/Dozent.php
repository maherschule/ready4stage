<?php
namespace app\Benutzer;

use app\DB\Iorm;
use app\DB\Torm;

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

 
    public function __construct(\PDO $db, $data = array()){
        $this->db = $db;   
        if(count($data)){
            $this->apply($data);
        }
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