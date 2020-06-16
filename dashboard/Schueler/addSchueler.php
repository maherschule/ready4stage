<?php

use app\Instrument\Instrument;

?>
<div class="schuelerDialog bg-white ml-4 p-4 col-lg-8 col-xl-8 col-s-12 col-xs-12">
<p class="h3 mt-3 mb-3">schueler bearbeiten / hinzufügen</p>

                         <form>
                              <input type="hidden" name="schueler_ID" value="0">
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
                                   <div class="form-group col-xl-6">
                                        <label for="Geburtsort">Geburtsort</label>
                                        <input class="form-control" name="Geburtsort" type="text" value="">  
                                   </div>
                                   <div class="form-group col-xl-6">
                                        <label for="Geburtsdatum">Geburtsdatum</label>

                                        <input class="form-control" name="Geburtsdatum" type="date" value="xx.xx.xxxx" id="Geburtsdatum">  
                                   </div>
                              </div>
                              <!--
                              <div class="row">
                                   <div class="form-group col-xl-12 ">
                                        <label for="Geburtsdatum">Geburtsdatum</label>

                                        <input class="form-control" name="Geburtsdatum" type="date" value="xx.xx.xxxx" id="Geburtsdatum">  
                                   </div>
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
-->

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
                                   <div class="form-group col-xl-12 col-lg-12">
                                        <label for="IBAN">IBAN</label>
                                        <input type="text" name="IBAN" class="form-control">
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="col-xl-12">
                                        <button type="button" class="speichern btn btn-dark float-right ml-4">Speichern</button>
                                        <button type="button" class="abbrechen btn btn-secondary float-right">abbrechen</button>
                                        
                                   </div>
                              </div>
                              
                         </form>
                    </div>