<?php

define('db_user', 'myroot');
define('db_pass', 'maher1234');
define('host', 'localhost');
define('dbname', 'ready4stage');

$sessiontimeout = 300;
$tables = [
    'Benutzer' => 'Benutzer',
    'Dozent' => 'Dozent',
    'Schueler' => 'Schueler',
    'Dozent_Qualifikation' => 'Dozent_Qualifikation'
];
try{
    $db = app\DB\DB::connect(host, db_user,db_pass) or die("Verbindung ist nicht moeglich");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->query("use " . dbname . ";") or die("Datenbank existiert nicht...");
}
catch(PDOException $err){
    die($err->getMessage());
}