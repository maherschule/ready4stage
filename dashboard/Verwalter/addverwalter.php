<?php


?>
<div class="BenutzerDialog bg-white ml-4 p-4 col-lg-8 col-xl-8 col-s-12 col-xs-12">
<p class="h3 mt-3 mb-3">Verwalter bearbeiten / hinzufügen</p>

                         <form>
                              <input type="hidden" name="Benutzer_ID" value="0">
                              <div class="row">
                                   <div class="form-group col-xl-6">
                                        <label for="Benutzername">Benutzername</label>
                                        <input type="text" name="Benutzername" class="form-control">
                                   </div>
                                   <div class="form-group col-xl-6">
                                        <label for="Email">Email</label>
                                        <input type="text" name="Email" class="form-control">
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="form-group col-xl-6">
                                        <label for="Benutzer_Passwort">Password</label>
                                        <input type="text" name="Benutzername" class="form-control">
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-xl-12">
                                        <button type="button" class="btn btn-dark speichern float-right ml-4">Speichern</button>
                                        
                                        <button type="button" class="btn btn-secondary float-right abbrechen" data-dialog=".BenutzerDialog">abbrechen</button>
                                       
                                   </div>
                              </div>
                              
                         </form>
                    </div>