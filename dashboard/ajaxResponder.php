<?php

use app\Raum\Raum;

include_once dirname(__FILE__, 2) . "/inc/app.top.php"; 
include_once dirname(__FILE__, 2) . "/inc/sessionCheck.php"; 


$response = ['status' => false , 'msg' => 'Fehler', 'data' => null];
switch($_REQUEST['action']){
    case 'updateRaum':
        $raum = new Raum($db);
        $raumData = $raum->update($_REQUEST['id'],$_REQUEST);
        if($_REQUEST['eignung'] && !empty($_REQUEST['eignung'])){
            if($raum->deleteRaumsEignung($_REQUEST['id'])){
                foreach($_REQUEST['eignung'] as $eignung){
                    $raum->addRaumEignung($_REQUEST['id'], $eignung);
                }
            }
          
        }
        $response['status'] = TRUE;
        $response['msg'] = 'Raum wurde bearbeitet';
        die(json_encode($response));
    break;
    case 'saveRaum':
        $raum = new Raum($db);
        $raumData = $raum->save($_REQUEST);
        $raumid = $raum->getLastInsertedId();
        if($_REQUEST['eignung']){
            if($raumid){
                foreach($_REQUEST['eignung'] as $eignung){
                    $raum->addRaumEignung($raumid, $eignung);
                }
            }
        }
        $response['status'] = TRUE;
        $response['msg'] = 'Raum wurde gespeichert';
        die(json_encode($response));
    break;
    case 'getRaum':
        $raum = new Raum($db);
        $raumData = $raum->get($_REQUEST['id']);
        $raumseignung = $raum->getRaumsEignung($_REQUEST['id']);
        $raumData[0]['eignung'] = $raumseignung;
         if($raumData){
            $response['status'] = TRUE;
            $response['data'] = $raumData;
        }

        die(json_encode($response));
    break;
    case 'deleteRaum':
        $raum = new Raum($db);
        $status = $raum->delete($_REQUEST['id']);
        if($status) {
           $response['status'] = $status;
           $response['msg'] = 'Raum wurde gelöscht'; 
        }
       die(json_encode($response));
    break;
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
        $class = "app\\Benutzer\\" . $_REQUEST['type'];
        $class = new $class($db);
        $class->save($_REQUEST);
        $lastId = $class->getLastInsertedId();
        if($_REQUEST['type'] === 'Dozent'){
            if($_REQUEST['qualifikation']){
                if($lastId){
                    foreach($_REQUEST['qualifikation'] as $qualifikation){
                        $class->addSpezifikationen($lastId, $qualifikation);
                    }
                }
            }
        }
        $response['status'] = TRUE;
        $response['msg'] = 'updated';
        die(json_encode($response));
    break;
    case 'update':
        $class = "app\\Benutzer\\" . $_REQUEST['type'];
        $class = new $class($db);
        $class->update($_REQUEST['id'], $_REQUEST);
        if($_REQUEST['type'] ==='Dozent'){
            $class->deleteSpezifikationen($_REQUEST['id']);
            foreach($_REQUEST['qualifikation'] as $qualifikation){
                $class->addSpezifikationen($_REQUEST['id'], $qualifikation);
            }
        }
        $response['status'] = TRUE;
        $response['msg'] = 'updated';
        die(json_encode($response));

    break;
    case 'get':
        $class = "app\\Benutzer\\" . $_REQUEST['type'];
        $class = new $class($db);
        $classData = $class->get($_REQUEST['id']);
        if($class){
            $response['status'] = (bool) $classData;
            $response['data'] = $classData;
        }
        if($_REQUEST['type'] == 'Dozent'){
            $response['data'][0]['qualifikation'] = $class->Dozentspezifikation($_REQUEST['id']); 
        }
        die(json_encode($response));
    break;
}