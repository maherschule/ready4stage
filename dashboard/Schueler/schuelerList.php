<?php
use app\Benutzer\Schueler;
?>
<div class="bg-white p-1 h-100">
    <div class="schuelerList listOuterWrapper ">
        <div class="listInnerWrapper">
                <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <!-- 
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
                    -->
                </div>
                <div class="listBody">
                    <?php 
                        $schueler = new Schueler($db);
                        $schueler = $schueler->get();
                        $name = 'Schüler';
                        $ele = '';
                        foreach($schueler as $item){
                            $ele .= '<div class="listEle schueler_'.$item['Schueler_ID'].'" data-schuelerid='.$item['Schueler_ID'].'>';
                            $ele .= '<div class="listEleLeft">';
                            $ele .= '<p>'.$item['Vorname'].', '.$item['Nachname'].'</p>';
                            $ele .= ' </div>';
                            $ele .= '<div class="listEleRight">';
                            $ele .= '<img class ="editicon" src="assets/media/edit.png" alt="edit">';
                            $ele .= '<img class ="deleteicon" src="assets/media/delete.png" alt="delete" data-toggle="modal" data-target="#deleteSchuelerModal">';
                            $ele .= '</div>';
                            $ele .= '</div>';
                        }

                        echo $ele;
                    ?>

                </div>
                <div class="listFooter">
                    <div class="footermsg"><span class="listAnzahl"><?php echo count($schueler) . " </span>" . $name?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteSchuelerModal" tabindex="-1" role="dialog" aria-labelledby="deleteSchuelerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteSchuelerLabel">Schüler Löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Möchten Sie diesen Schüler aus der Datenbank löschen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-danger" id="modalok">Bestätigen</button>
      </div>
    </div>
  </div>
</div>