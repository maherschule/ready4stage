<?php

function redirect($path){
    header('Location: ' . $path);
}

function userart(){
	// Testet, ob der eingeloggte User das darf; Übernimmt als Argumente die verschiedenen Nutzungsarten ,die das dürfen
	$args = func_get_args();
	return in_array($_SESSION['Benutzer']['Benutzerrole'] ,$args);
}