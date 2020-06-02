<?php include_once dirname(__FILE__, 2) . "/inc/validate.php"; ?>
<?php include "header.php"; ?> 
    <form action="" method="POST">
        <div class="loginContainer">
            <div class="loginInnerWrapper">
                <div class="logWrapper">
                            <img src="assets/media/logo.jpeg" alt="">
                </div>
                <div class="loginWrapper">
                    <div class="middleSection">
                
                        <div class="BenutzernameWrapper">
                            <input type="text" name='Benutzername' placeholder="Benutzername" class="textFormInput" value="<?php echo $_POST['Benutzername'] != "" ? $_POST['Benutzername'] : ""; ?>">
                        </div>
                        <div class="KennwortWrapper">
                            <input type="password" name='Benutzer_Passwort' placeholder="Kennwort" class="textFormInput">                
                        </div>
                        <div class="submitBtnWrpper">
                            <input type="submit" value="Anmelden" class="submitFormInput">
                        </div>
                    </div>

                    <div class="lowerSection">
                    
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php include "footer.php"; ?> 
