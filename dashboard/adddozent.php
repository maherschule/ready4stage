<?php

use app\Instrument\Instrument;

?>
<div class="dozentDialog bg-white ml-4 p-4 d-none">
<p class="h3 mt-3 mb-3">Dozent bearbeiten / hinzufügen</p>

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
                                   <hr />
                              </div>

                              <div class="row">
                                   <div class="col-xl-12">
                                        <button type="button" class="btn btn-dark float-right ml-4">Speichern</button>
                                        <button type="button" class="btn btn-secondary float-right" data-tohide=".dozentDialog">abbrechen</button>

                                   </div>
                              </div>
                              
                         </form>
                    </div>