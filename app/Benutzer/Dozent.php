<?php
namespace app\Benutzer;

class Dozent extends Benutzer {
    public $Stundensatz;
    public $Qualifikationen = array();


    public function __construct($data)
    {
        if($data && $data['Benutzerrolle'] === Benutzer::FLAG_BENUTZERROLLE_DOZENT){
            $this->Benutzername = $data['Benutzername'] ;
            $this->Vorname = $data['Vorname'] ;
            $this->Nachname = $data['Nachname'] ;
            $this->Email = $data['Email'];
            $this->Strasse = $data['Strasse'];
            $this->Hausnr = $data['Hausnr'] ;
            $this->Iban = $data['Iban'];
            $this->Benutzerrolle = $data['Benutzerrolle'];
            $this->Kennwort = $data['Kennwort'];
            $this->Geburtsort = $data['Geburtsort'];
            $this->Gebutsdatum = $data['Gebutsdatum'] ;
            $this->EintragDatum = $data['EintragDatum'];
            $this->Stundensatz = $data['Stundensatz'];
            $this->Qualifikationen = $data['Qualifikationen'];
        }
    }
}