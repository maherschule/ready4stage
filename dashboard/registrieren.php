
    <div class="registrierenContainer">
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

            <!-- Für Dotzen -->
            <div class="StundensatzWrapper">
                <input type="text" name="Stundensatz" class="textFormInput Stundensatz" pattern="\$\d{1,}*(\,\d+)?$" placeholder="Stundensatz in Euro">
            </div>
            <div class="qualifikationWrapper">
                <select class="selectFormInput" name="Qualifikation" >
                    <option value="">Qualifikation</option>
                    <!-- placeholder -->
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