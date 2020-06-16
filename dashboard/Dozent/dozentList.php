<?php

use app\Benutzer\Dozent;

?>
<div class="bg-white p-1 h-100">
    <div class="dozentList listOuterWrapper ">
        <div class="listInnerWrapper">
                <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <!-- 
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
                    -->
                </div>
                <div class="listBody">
                    <?php 
                        $dozent = new Dozent($db);
                        $dozent = $dozent->get();
                        $name = count($dozent) > 1 ? 'Dozent' : 'Dozenten';
                        $ele = '';
                        foreach($dozent as $item){
                            $ele .= '<div class="listEle dozent_'.$item['Dozent_ID'].'" data-dozentid='.$item['Dozent_ID'].'>';
                            $ele .= '<div class="listEleLeft">';
                            $ele .= '<p>'.$item['Vorname'].', '.$item['Nachname'].'</p>';
                            $ele .= ' </div>';
                            $ele .= '<div class="listEleRight">';
                            $ele .= '<img class ="editicon" src="assets/media/edit.png" alt="edit">';
                            $ele .= '<img class ="deleteicon" src="assets/media/delete.png" alt="delete" data-toggle="modal" data-target="#deletedozentModal">';
                            $ele .= '</div>';
                            $ele .= '</div>';
                        }

                        echo $ele;
                    ?>

                </div>
                <div class="listFooter">
                    <div class="footermsg"><span class="listAnzahl"><?php echo count($dozent) . " </span>" . $name?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deletedozentModal" tabindex="-1" role="dialog" aria-labelledby="deletedozentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletedozentLabel">Dozent Löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Möchten Sie diesen Dozent aus der Datenbank löschen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-danger" id="modalok">Bestätigen</button>
      </div>
    </div>
  </div>
</div>