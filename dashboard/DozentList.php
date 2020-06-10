<?php
use app\Benutzer\Dozent;
?>
<div class="bg-white p-1 h-100">
    <div class="listOuterWrapper ">
        <div class="listInnerWrapper">
                <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
                </div>
                <div class="listBody">
                    <?php 
                        $dozenten = new Dozent($db);
                        $dozenten = $dozenten->get();
                        $name = count($dozenten) > 1 ? 'Dozenten' : 'Dozent';
                        $ele = '';
                        foreach($dozenten as $dozent){
                            $ele .= '<div class="listEle dozent_'.$dozent['Dozent_ID'].'" data-dozentid='.$dozent['Dozent_ID'].'>';
                            $ele .= '<div class="listEleLeft">';
                            $ele .= '<p>'.$dozent['Vorname'].', '.$dozent['Nachname'].'</p>';
                            $ele .= ' </div>';
                            $ele .= '<div class="listEleRight">';
                            $ele .= '<img class ="editicon" src="assets/media/edit.png" alt="edit">';
                            $ele .= '<img class ="deleteicon" src="assets/media/delete.png" alt="delete" data-toggle="modal" data-target="#deleteDozentModal">';
                            $ele .= '</div>';
                            $ele .= '</div>';
                        }

                        echo $ele;
                    ?>

                </div>
                <div class="listFooter">
                    <div class="footermsg"><span class="listAnzahl"><?php echo count($dozenten) . " </span>" . $name?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteDozentModal" tabindex="-1" role="dialog" aria-labelledby="deleteDozentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDozentLabel">Dozent Löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Möchten Sie diesen Dozenten aus der Datenbank löschen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-danger" id="modalok">Bestätigen</button>
      </div>
    </div>
  </div>
</div>