<?php

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
<div class="container">
     <div class="row">
          <div class="col-4">
               <div class="listOuterWrapper ">
                    <div class="listInnerWrapper">
                         <div class="listHeader">
                              <input type="text" id="inputSearch">
                              <img class ="addicon" src="assets/media/add.png" alt="edit" data-toggle="modal" data-target="#exampleModal">
                         </div>
                         <div class="listBody">
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">
                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>
                              <div class="listEle">
                                   <div class="listEleLeft">
                                        <p>Vorname, Nachname</p>
                                   </div>
                                   <div class="listEleRight">
                                        <img class ="editicon" src="assets/media/edit.png" alt="edit">
                                        <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                                   </div>
                              </div>

                         </div>
                         <div class="listFooter">
                              <div class="footermsg">12 Dozeten</div>
                         </div>
                    </div>
               </div>
          </div>


          <div class="col-8">
               <form>
                    <div class="row">
                         <div class="form-group col-xl-6">
                              <label for="Vorname">Vorname</label>
                              <input type="text" name="Vorname" class="form-control">
                         </div>
                         <div class="form-group col-xl-6">
                              <label for="Nachname">Nachname</label>
                              <input type="text" name="Nachname" class="form-control">
                         </div>
                    </div>

                    <div class="row">
                         <div class="form-group col-xl-12">
                              <label for="Email">Email</label>
                              <input type="text" name="Email" class="form-control">
                         </div>
                    </div>

                    <div class="row">
                         <div class="form-group col-xl-12">
                              <label for="Telefonnummer">Telefonnummer</label>
                              <input type="text" name="Telefonnummer" class="form-control">
                         </div>
                    </div>

                    <div class="row">
                         <div class="form-group col-xl-3">
                              <label for="gebTag">Tag</label>
                              <input type="text" name="gebTag" class="form-control">
                         </div>
                         <div class="form-group col-xl-3">
                              <label for="gebMonat">Monat</label>
                              <input type="text" name="gebMonat" class="form-control">
                         </div>
                         <div class="form-group col-xl-6">
                              <label for="gebJahr">Jahr</label>
                              <input type="text" name="gebJahr" class="form-control">
                         </div>
                    </div>

                    <div class="row">
                         <div class="form-group col-xl-8">
                              <label for="Strasse">Straße</label>
                              <input type="text" name="Strasse" class="form-control">
                         </div>
                         <div class="form-group col-xl-4">
                              <label for="Hausnr">Hausnr</label>
                              <input type="text" name="Hausnr" class="form-control">
                         </div>

                    </div>

                    <div class="row">
                         <div class="form-group col-xl-12">
                              <label for="Iban">IBAN</label>
                              <input type="text" name="Iban" class="form-control">
                         </div>
                    </div>

                    <div class="row">
                         <div class="form-group col-xl-12">
                              <label for="Stundensatz">Stundensatz</label>
                              <input type="text" name="Stundensatz" class="form-control">
                         </div>
                    </div>

                    <div class="row">
                         <?php
                              $instrumente = new Instrument($db);
                              $instrumente = $instrumente->get();
                              $ele = "";
                              foreach($instrumente as $instrument){
                                   $ele .= "<div class='form-group  col-xl-3'>";
                                   $ele .= "<div class='form-check'>";
                                   $ele .= "<input class='form-check-input' type='checkbox' value='".$instrument['Instument_ID']."' id='".$instrument['Instrument']."'>";
                                   $ele .= "<label class='form-check-label' for='".$instrument['Instrument']."'>";
                                   $ele .= $instrument['Instrument'];
                                   $ele .= "</label>";
                                   $ele .= "</div>";
                                   $ele .= "</div>";
                              }
                              echo $ele;
                         ?>
                    </div>

                    
               </form>
          </div>
     </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--
<div class="mainContainer  flexrow fstart">

     <div class="listOuterWrapper ">
          <div class="listInnerWrapper">
               <div class="listHeader">
                    <input type="text" id="inputSearch">
                    <img class ="addicon" src="assets/media/add.png" alt="edit">
               </div>
               <div class="listBody">
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">
                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>
                    <div class="listEle">
                         <div class="listEleLeft">
                              <p>Vorname, Nachname</p>
                         </div>
                         <div class="listEleRight">
                              <img class ="editicon" src="assets/media/edit.png" alt="edit">
                              <img class ="deleteicon" src="assets/media/delete.png" alt="delete">

                         </div>
                    </div>

               </div>
               <div class="listFooter">
                    <div class="footermsg">12 Dozeten</div>
               </div>
          </div>
     </div>


     
    <div class="registrierenContainer flex1 border03 ml20">
        <div class="registrierenWrapper">
            <div class="nameWrapper">
                <input type="text" name="Vorname" class="textFormInput" placeholder="Vorname">
                <input type="text" name="Nachname" class="textFormInput" placeholder="Nachname">
            </div>
            <div class="emailWrapper">
                <input type="text" name="Email" class="textFormInput" placeholder="Email">
            </div>
            <div class="telefonNrWrapper">
                <input type="text" name="Telefonnummer" class="textFormInput" placeholder="Telefonnummer">
            </div>
            <div class="gebutsWrapper">
                <input type="text" name="gebTag" class="textFormInput tag" placeholder="Tag">
                <input type="text" name="gebMonat" class="textFormInput monat" placeholder="Monat">
                <input type="text" name="gebJahr" class="textFormInput jahr" placeholder="Jahr">
            </div>
            <div class="strasseWrapper">
                <input type="text" name="Strasse" class="textFormInput strasse" placeholder="Strasse">
                <input type="text" name="Hausnr" class="textFormInput hausnr" placeholder="Hausnr">
            </div>
            
            <div class="IbanNrWrapper">
                <input type="text" name="Iban" class="textFormInput" placeholder="IBAN">
            </div>

            <div class="StundensatzWrapper">
                <input type="text" name="Iban" class="textFormInput Stundensatz" pattern="\$\d{1,}*(\,\d+)?$" placeholder="Stundensatz in Euro">

            </div>
            <div class="qualifikationWrapper">
                <select class="selectFormInput" name="Qualifikation" >
                    <option value="">Qualifikation</option>
                    <option value="Klavier">Klavier</option>
                    <option value="Gitarre">Gitarre</option>
                    <option value="Klarinette">Klarinette</option>
                    <option value="Floete">Floete</option>

                </select>
            </div>

            <div class="submitBtnWrpper">
                    <input type="submit" value="Speichern" class="submitFormInput">
                </div>
        </div>
    </div>
    
</div>
-->
<?php include "footer.php"; ?> 

               