<?php

define('DB_USER', 'myroot');
define('DB_PASS', 'maher1234');
define('HOST', 'localhost');
define('DBNAME', 'ready4stage');

$sessiontimeout = 300;
$tables = [
    'Benutzer' => 'Benutzer',
    'Dozent' => 'Dozent',
    'Schueler' => 'Schueler',
    'Dozent_Qualifikation' => 'Dozent_Qualifikation'
];
try{
    $db = app\DB\DB::connect(HOST, DB_USER,DB_PASS) or die("Verbindung ist nicht moeglich");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->query("use " . DBNAME . ";") or die("Datenbank existiert nicht...");
}
catch(PDOException $err){
    die($err->getMessage());
}