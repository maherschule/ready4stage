<?php
include_once dirname(__FILE__, 2) . "/inc/app.top.php"; 
include_once dirname(__FILE__, 2) . "/inc/sessionCheck.php"; 

?>
     
<?php include "header.php"; ?> 
<?php include "navbar.php"; ?> 

<?php 
?>

<div class="container-fluid">
     <div class="row p-4 d-flex justify-content-start">
          <?php include "Schueler/schuelerList.php"; ?> 
          <?php include "Schueler/addSchueler.php"; ?>

     </div>
</div>


<?php include "footer.php"; ?> 
