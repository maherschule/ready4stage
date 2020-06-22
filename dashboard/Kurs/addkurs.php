<?php

use app\Benutzer\Dozent;
use app\DB\DB;
use app\Instrument\Instrument;
use app\Kurs\Kurs;

?>
<div class="kursDialog bg-white ml-4 p-4 col-lg-8 col-xl-8 col-s-12 col-xs-12">
<p class="h3 mt-3 mb-3">Kurs bearbeiten / hinzufügen</p>

                         <form>
                              <input type="hidden" name="Kurs_ID" value="0">
                              <div class="row">
                                   <div class="form-group col-xl-6">
                                        <label for="Kurs">Kurs</label>
                                        <input type="text" name="Kurs" class="form-control">
                                   </div>
                              </div>

                              <div class="row">
                                   <?php
                                         
                                        $dozent = new Dozent($db);
                                        $dozente = $instrumente->get();
                                        $ele = "";
                                        foreach($dozente as $d){
                                             $k = new Kurs($db);
                                             $kdozent = $k->getKursDozent($d['Dozent_ID']);
                                             $ele .= "<div class='form-group  col-xl-3'>";
                                             $ele .= "<div class='form-check'>";
                                             $ele .= "<input class='form-check-input' type='checkbox' value='".$d['Instrument_ID']."' id='".$instrument['Instrument']."'>";
                                             $ele .= "<label class='form-check-label' for='".$d['Instrument']."'>";
                                             $ele .= $d['Instrument'];
                                             $ele .= "</label>";
                                             $ele .= "</div>";
                                             $ele .= "</div>";
                                        }
                                        echo $ele;
                                   ?>
                                   <hr />
                              </div>

                              <div class="row">
                                   <div class="col-xl-12">
                                        <button type="button" class="btn btn-dark speichern float-right ml-4">Speichern</button>
                                        
                                        <button type="button" class="btn btn-secondary float-right abbrechen" data-dialog=".KursDialog">abbrechen</button>
                                       
                                   </div>
                              </div>
                              
                         </form>
                    </div>