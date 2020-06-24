<?php

use app\Benutzer\Benutzer;

?>
<div class="bg-white p-1 h-100">
    <div class="verwalterList listOuterWrapper">
        <div class="listInnerWrapper">
                <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <!-- 
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
                    -->
                </div>
                <div class="listBody">
                    <?php 
                        $benutzer = new Benutzer();
                        $verwalteren = $benutzer->getVerwalter();
                        $name = 'Verwalter';
                        $ele = '';
                        foreach($verwalteren as $v){
                            $ele .= '<div class="listEle verwalter_'.$v['Benutzername'].'" data-verwalterid='.$v['Benutzername'].'>';
                            $ele .= '<div class="listEleLeft">';
                            $ele .= '<p>'.$v['Benutzername'].', ('.$v['Email'].')</p>';
                            $ele .= ' </div>';
                            $ele .= '<div class="listEleRight">';
                            $ele .= '<img class ="editicon" src="assets/media/edit.png" alt="edit">';
                            $ele .= '<img class ="deleteicon" src="assets/media/delete.png" alt="delete" data-parentele="verwalter_'.$verwalter['Benutzername'].'">';
                            $ele .= '</div>';
                            $ele .= '</div>';
                        }

                        echo $ele;
                    ?>

                </div>
                <div class="listFooter">
                    <div class="footermsg"><span class="listAnzahl"><?php echo count($verwalteren) . " </span>" . $name?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteverwalterModal" tabindex="-1" role="dialog" aria-labelledby="deleteverwalterLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteverwalterLabel">verwalter Löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Möchten Sie diesen verwalteren aus der Datenbank löschen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-danger" id="modalok">Bestätigen</button>
      </div>
    </div>
  </div>
</div>