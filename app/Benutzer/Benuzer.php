<?php
namespace app\Benutzer;

abstract class Benutzer{
    static public $dbname = db_user;
    static public $tableName = 'Benutzer';
    static public $pkName = 'Benutzername';

    const FLAG_BENUTZERROLLE_SCHUELER = 1;
    const FLAG_BENUTZERROLLE_DOZENT = 2;
    const FLAG_BENUTZERROLLE_VERWALTER = 3;

    protected $Benutzername;
    protected $Vorname;
    protected $Nachname;
    protected $Email;
    protected $Strasse;
    protected $Hausnr;
    protected $Iban;
    protected $Benutzerrolle;
    protected $Kennwort;
    protected $Geburtsort;
    protected $Gebutsdatum;
    protected $EintragDatum;

    private function __construct(){}
    
}