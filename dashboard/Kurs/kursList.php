<?php

use app\Kurs\Kurs;

?>
<div class="bg-white p-1 h-100">
    <div class="kursList listOuterWrapper">
        <div class="listInnerWrapper">
                <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <!-- 
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
                    -->
                </div>
                <div class="listBody">
                    <?php 
                        $kurs = new Kurs($db);
                        $kurse = $kurs->get();
                        $name = count($kurse) > 1 ? 'Kurs' : 'Kurse';
                        
                        $ele = '';
                        foreach($kurse as $k){
                            $kursdozent = $kurs->getKursDozent($k['Dozent_ID']);
                            $kursschueler = $kurs->getKursSchueler($k['Kurs_ID']); 
                            $ele .= '<div class="listEle Kurs_'.$k['Kurs_ID'].'" data-kursid='.$k['Kurs_ID'].'>';
                            $ele .= '<div class="listEleLeft">';
                            $ele .= '<p>'.$k['Kurs'].', '.$kursdozent['Benutzername'].', ('.count($kursschueler).' Schüler)</p>';
                            $ele .= ' </div>';
                            $ele .= '<div class="listEleRight">';
                            $ele .= '<img class ="editicon" src="assets/media/edit.png" alt="edit">';
                            $ele .= '<img class ="deleteicon" src="assets/media/delete.png" alt="delete" data-parentele="Kurs_'.$Kurs['Kurs_ID'].'">';
                            $ele .= '</div>';
                            $ele .= '</div>';
                        }

                        echo $ele;
                    ?>

                </div>
                <div class="listFooter">
                    <div class="footermsg"><span class="listAnzahl"><?php echo count($kurse) . " </span>" . $name?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteKursModal" tabindex="-1" role="dialog" aria-labelledby="deleteKursLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteKursLabel">Kurs Löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Möchten Sie diesen Kursen aus der Datenbank löschen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-danger" id="modalok">Bestätigen</button>
      </div>
    </div>
  </div>
</div>