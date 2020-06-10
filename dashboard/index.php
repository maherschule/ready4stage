<?php

use app\Benutzer\Dozent;
use app\Benutzer\Schueler;
use app\Instrument\Instrument;
use app\Kurs\Kurs;
use app\Raum\Raum;

include_once dirname(__FILE__, 2) . "/inc/app.top.php"; 
include_once dirname(__FILE__, 2) . "/inc/sessionCheck.php"; 

?>
     
<?php include "header.php"; ?> 
<?php include "navbar.php"; ?> 

<?php 

/*
     $schuler = new Kurs($db, ['Array' => 10, 'arr' => 22]);
     var_dump($schuler->get(3));
     die();
     */
?>
<div class="container-fluid">
     <div class="row p-4 d-flex justify-content-start">
          <?php include "DozentList.php"; ?> 
          <?php include "adddozent.php"; ?>

     </div>
</div>


<?php include "footer.php"; ?> 

               