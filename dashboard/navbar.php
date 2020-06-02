<div class="navContainer">
        <div class="hamburgermenuWrapper">
            <img src="assets/media/hamburgermenu.png" alt="">
        </div>
        <ul class="navUl">
            <li class="navLeftLi">
                <ul class="navLeftUi">
                    <li class="navliEle logo">
                        <a href="index.php">
                            <img src="assets/media/logo.jpeg" alt="ready4stage">
                        </a>
                    </li>
                    <li class="unterricht navliEle">
                        <a href="unterricht.php">Unterricht</a>
                    </li>
                    <li class="stundenplan navliEle">
                        <a href="stundenplan">Stundenplan</a>
                    </li>
                    <li class="mitarbeiter navliEle hasSubMenu">Mitarbeiter  &#x25BC;
                        <ul class="mitarbeiterUl navUlInnerUl">
                            <li class="dozenten navliEleInner">
                                <a href="dozenten.php">Dozenten</a>
                            </li>
                            <li class="verwalter navliEleInner">
                                <a href="verwalter.php">Verwalter</a>
                            </li>
                        </ul>
                    </li>
                
                    <li class="schueler navliEle">
                        <a href="schueler.php">Schüler</a>
                    </li>
                    <li class="raeume navliEle">
                        <a href="raeume.php">Räume</a>
                    </li>
                </ul>
            </li>
            <li class="navRightLi ">
                <ul class="navRightUl">
                    <li class="user navliEle">
                        <a href=""><?php echo $_SESSION['Benutzer']['Benutzername'] != "" ?  $_SESSION['Benutzer']['Benutzername'] : "";?></a>
                    </li>
                    <li class="logout navliEle">
                        <a href="logout.php">Abmelden</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>