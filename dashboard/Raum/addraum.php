<?php

use app\Instrument\Instrument;

?>
<div class="raumDialog bg-white ml-4 p-4 col-lg-8 col-xl-8 col-s-12 col-xs-12">
<p class="h3 mt-3 mb-3">Raum bearbeiten / hinzufügen</p>

                         <form>
                              <input type="hidden" name="raum_ID" value="0">
                              <div class="row">
                                   <div class="form-group col-xl-6">
                                        <label for="Raumnr">Raumnr</label>
                                        <input type="text" name="Raumnr" class="form-control">
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
                                             $ele .= "<input class='form-check-input' type='checkbox' value='".$instrument['Instrument_ID']."' id='".$instrument['Instrument']."'>";
                                             $ele .= "<label class='form-check-label' for='".$instrument['Instrument']."'>";
                                             $ele .= $instrument['Instrument'];
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
                                        
                                        <button type="button" class="btn btn-secondary float-right abbrechen" data-dialog=".raumDialog">abbrechen</button>
                                       
                                   </div>
                              </div>
                              
                         </form>
                    </div>