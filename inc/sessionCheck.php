<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    $_SESSION['logged_in'] = FALSE;
}


if(($_SESSION['logged_in']) == TRUE){

    // nach 5 Minuten ohne Interaktion dann raus hier!
    if ((isset($_SESSION['LAST_CHECKED']) && (time() - $_SESSION['LAST_CHECKED'] > $sessiontimeout))) {
        
        session_destroy();
        session_unset();
        redirect('../dashboard/login.php');
        exit;
    }

    $_SESSION['LAST_CHECKED'] = time();
}else{
    redirect('../dashboard/login.php');
    exit;
}
?>