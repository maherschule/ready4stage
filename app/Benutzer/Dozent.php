<?php
namespace app\Benutzer;

use app\DB\DB;
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
    public $Geburtsdatum;
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

    public function Dozentspezifikation($id){
        $id = intval($id);
        $query = "SELECT d.Instrument_ID, i.Instrument FROM `".DBNAME."`.`Dozentspezifikation` as d right JOIN `".DBNAME."`.`Instrumente` as i  USING (Instrument_ID) WHERE Dozent_Id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $error_code = $stmt->errorCode();
        $result = [];
        // $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $fetch){

            $result[$fetch['Instrument_ID']] = $fetch['Instrument'];
        }
        return $result;
   }


   public function deleteSpezifikationen($id){
       $id = intval($id);
       $query = "DELETE FROM `".DBNAME."`.`Dozentspezifikation` WHERE Dozent_ID = :id";
       $stmt = $this->db->prepare($query);
       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       $error_code = $stmt->errorCode();
       return $error_code === "00000";
   }

   public function addSpezifikationen($dozent_id, $instrument_id){
       $dozent_id = intval($dozent_id);
       $instrument_id = intval($instrument_id);

        $query = "INSERT INTO `".DBNAME."`.`Dozentspezifikation` VALUE(NULL, :dozent_id,:instrument_id);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':dozent_id', $dozent_id, PDO::PARAM_INT);
        $stmt->bindParam(':instrument_id', $instrument_id, PDO::PARAM_INT);
        $stmt->execute();
        $error_code = $stmt->errorCode();
        return $error_code === "00000";

   }
    public function apply($data = []){
        $this->Dozent_ID = $data['Dozent_ID'];
        $this->Vorname = $data['Vorname'];
        $this->Nachname = $data['Nachname'];
        $this->Geburtsort = $data['Geburtsort'];
        $this->Geburtsdatum = $data['Geburtsdatum'];
        $this->Strasse = $data['Strasse'];
        $this->Hausnr = $data['Hausnr'];
        $this->Email = $data['Email'];
        $this->Telefonnummer = $data['Telefonnummer'];
        $this->IBAN = $data['IBAN'];
   }
}