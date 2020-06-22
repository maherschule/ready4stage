<?php
session_start();
include_once dirname(__FILE__, 2) . "/inc/app.top.php";
$user_exists = TRUE;
$errors = [];
if ((isset($_POST["Benutzername"])) && (isset($_POST["Benutzer_Passwort"]))) {

    $query = "SELECT * FROM `".$tables['Benutzer']."` WHERE `Benutzername`= ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$_POST["Benutzername"]]);
    if(!$stmt->rowCount()){
        // nicht registriert
        // Benutzer melden
        $user_exists = FALSE;
        
        redirect('../dashboard/login.php');
        exit;
    }


    if($user_exists == TRUE){
        
        $stmt = $db->prepare("SELECT * FROM `".$tables['Benutzer']."` WHERE `Benutzername`= ?");
        $stmt->execute([$_POST["Benutzername"]]);
        if(!$stmt->rowCount()){
            // muss nicht auftreten, aber komische Dinge können immer passieren
            session_destroy();
            session_unset();
            redirect('../dashboard/login.php');
            exit;
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $passHash = $result['Benutzer_Passwort'];

        if(!password_verify($_POST['Benutzer_Passwort'], $passHash)){
            // Benutzer melden
            redirect('../dashboard/login.php');
            exit;
        }

        $_SESSION['logged_in'] = TRUE;
        if($result['Benutzerrole'] === 'Verwalter'){

            $_SESSION['Benutzer'] = [
                'Benutzername' => $result['Benutzername'],
                'Email' => $result['Benutzer_Email'],
                'Benutzerrole' => $result['Benutzerrole']
            ];
            $d = 10;
        }else{
            $where = [];
            $from = $result['Benutzerrole'];
            $id = $from . "_ID";
            $sql = "SELECT a.*, b.Benutzername, b.Benutzerrole FROM `".$from."` a INNER JOIN Benutzer b WHERE b.Benutzerrole = '".$from."' AND b.Benutzer_Email = '".$result['Benutzer_Email']."'" ;
            $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
       
            
            
            $_SESSION['Benutzer'] = [
                $id => $result[$id],
                'Benutzername' => $result['Benutzername'],
                'Vorname' => $result['Vorname'],
                'Nachname' => $result['Nachname'],
                'Email' => $result['Email'],
                'adresse' => [
                    'Strasse' => $result['Strasse'],
                    'Hausnr' => $result['Hausnr'],
                ],
                'Geburtsort' => $result['Geburtsort'],
                'Gebutsdatum' => $result['Gebutsdatum'],
                'Telefonnummer' => $result['Telefonnummer'],
                'Benutzerrole' => $result['Benutzerrole']
                
            ];
            $_SESSION['LAST_CHECKED'] = time();
            redirect('../dashboard/index.php');
            exit;
        }
        $_SESSION['LAST_CHECKED'] = time();
        redirect('../dashboard/index.php');
        exit;
    }

}else{
}