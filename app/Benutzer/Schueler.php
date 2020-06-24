<?php
namespace app\Benutzer;

use app\DB\DB;
use app\DB\Iorm;
use app\DB\Torm;

class Schueler implements Iorm {
    use Torm;
    static public  $table_name = 'Schueler';
    static public $pkName = 'Schueler_ID';
    public $Schueler_ID;
    public $Vorname;
    public $Nachname;
    public $Geburtsort;
    public $Geburtsdatum;
    public $Strasse;
    public $Hausnr;
    public $Email;
    public $Telefonnummer;
    public $IBAN;
    
    /**
     * @var PDO
     */
    private $db;

    public function __construct($data = []){
        $this->db  = DB::connect();
        if($data){
            if(isset($data) && is_array($data) && !empty($data)){
                $this->apply($data);
            }
        }
        return $this;
    }


    public function apply($data = []){
         $this->Dozent_ID = $data['Schueler_ID'];
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
