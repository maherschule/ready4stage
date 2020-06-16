<?php

use app\Raum\Raum;

?>
<div class="bg-white p-1 h-100">
    <div class="raumList listOuterWrapper">
        <div class="listInnerWrapper">
                <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <!-- 
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
                    -->
                </div>
                <div class="listBody">
                    <?php 
                        $raumen = new Raum($db);
                        $raumen = $raumen->get();
                        $name = count($raumen) > 1 ? 'raumen' : 'raum';
                        $ele = '';
                        foreach($raumen as $raum){
                            $ele .= '<div class="listEle raum_'.$raum['Raum_ID'].'" data-raumid='.$raum['Raum_ID'].'>';
                            $ele .= '<div class="listEleLeft">';
                            $ele .= '<p>'.$raum['Raumnr']. '</p>';
                            $ele .= ' </div>';
                            $ele .= '<div class="listEleRight">';
                            $ele .= '<img class ="editicon" src="assets/media/edit.png" alt="edit">';
                            $ele .= '<img class ="deleteicon" src="assets/media/delete.png" alt="delete" data-parentele="raum_'.$raum['Raum_ID'].'">';
                            $ele .= '</div>';
                            $ele .= '</div>';
                        }

                        echo $ele;
                    ?>

                </div>
                <div class="listFooter">
                    <div class="footermsg"><span class="listAnzahl"><?php echo count($raumen) . " </span>" . $name?></div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteraumModal" tabindex="-1" role="dialog" aria-labelledby="deleteraumLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteraumLabel">raum Löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Möchten Sie diesen Raumen aus der Datenbank löschen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-danger" id="modalok">Bestätigen</button>
      </div>
    </div>
  </div>
</div>