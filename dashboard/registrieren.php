<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         @import url('assets/root.css');


        .registrierenContainer{
       
            height: 100%;
            position: relative;
            padding: 10px;
            padding-top: 60px;

        }
        .loginWrapper{
            position: relative;
            width: 100%;
        }
        .registrierenContainer input{
            height: 60px;
            
        }
  
        .nameWrapper {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .nameWrapper .textFormInput{
            width: 48%;

        }
        .gebutsWrapper{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .gebutsWrapper .textFormInput{
            width: 30%;
        }
        .gebutsWrapper .jahr {
            width: 40%;
        }
        .gebutsWrapper .monat {
            width: 25%;
        }
        .gebutsWrapper .tag {
            width: 25%;
        }

        .strasseWrapper{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .strasseWrapper .strasse{
            width: 60%;
        }
        .strasseWrapper .hausnr{
            width: 33%;
        }

    </style>
</head>
<body>
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
                <input type="text" name="Iban" class="textFormInput Stundensatz" pattern="\$\d{1,}*(\,\d+)?$" placeholder="Stundensatz in Euro">

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
</body>
</html>