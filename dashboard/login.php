<?php include_once dirname(__FILE__, 2) . "/inc/validate.php"; ?>
<?php include "header.php"; ?> 
    <form action="" method="POST">
        <div class="loginContainer">
            <div class="loginInnerWrapper">
                <div class="logWrapper">
                            <img src="assets/media/logo.png" alt="">
                </div>
                <div class="loginWrapper">
                    <div class="middleSection">
                
                        <div class="BenutzernameWrapper">
                            <!-- 
                            <label for="Benutzername">User</label>
                            -->
                            <input type="text" name='Benutzername' class="textFormInput" placeholder="Benutzername" value="<?php echo $_POST['Benutzername'] != "" ? $_POST['Benutzername'] : ""; ?>">
                            <img src="assets/media/user.png" alt="user icon ">
                        </div>
                        <div class="KennwortWrapper">
                            <!--
                                <label for="Benutzer_Passwort">Password</label>
                            -->
                            <input type="password" name='Benutzer_Passwort' placeholder="Password" class="textFormInput">                
                            <img src="assets/media/password.png" alt="user password">
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
