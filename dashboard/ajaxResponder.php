<?php
include_once dirname(__FILE__, 2) . "/inc/app.top.php"; 
include_once dirname(__FILE__, 2) . "/inc/sessionCheck.php"; 


$response = ['status' => false , 'msg' => 'Fehler', 'data' => null];
switch($_REQUEST['action']){
    case 'delete':
         $class = "app\\Benutzer\\" . $_REQUEST['type'];
         $class = new $class($db);
         $status = $class->delete($_REQUEST['id']);
         if($status) {
            $response['status'] = $status;
            $response['msg'] = $_REQUEST['type'] . ' wurde gelöscht'; 
         }
        die(json_encode($response));
    break;
    case 'create':
    break;
    case 'update':
    break;
    case 'get':
        $class = "app\\Benutzer\\" . $_REQUEST['type'];
        $class = new $class($db);
        $class = $class->get($_REQUEST['id']);
        if($class){
            $response['status'] = (bool) $class;
            $response['data'] = $class;
        }
        if($_REQUEST['type'] == 'Dozent'){
            $query = "SELECT * FROM `".DBNAME."`.`Dozentspezifikation` WHERE Dozent_ID = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$_REQUEST['id']]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $response
            }
        }
        die(json_encode($response));
    break;
}