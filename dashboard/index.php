<?php

use app\Benutzer\Benutzer;
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
     $benuzer = new Benutzer();
     $navCards = "";
     foreach($navs as $href => $details){
          if($details['posi'] === 'rechts') continue; 
          $navCards .= "<div class='navcard m-4' data-href='".$href."'>";
          $navCards .= "<p>".$details['name']."</p>";
          $navCards .= "</div>";
     }

?>
<div class="container-fluid">
     <div class="row pt-4">
          <?php echo $navCards;?>
     </div>
</div>


<?php include "footer.php"; ?> 

               