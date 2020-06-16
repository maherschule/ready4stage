<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="assets/media/logo.png" width="40" height="" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kurse</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="raum.php">Raum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dozent.php">Dozent</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="schueler.php">Schüler</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#">Verwalter</a>
      </li>
 
    </ul>
    <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">(<?php echo $_SESSION['Benutzer']['Benutzername']; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Abmelden</a>
            </li>
    </ul>
  </div>


</nav>
<!--
<div class="navContainer">
        <div class="hamburgermenuWrapper">
            <img src="assets/media/hamburgermenu.png" alt="">
        </div>
        <ul class="navUl">
            <li class="navLeftLi">
                <ul class="navLeftUi">
                    <li class="navliEle logo">
                        <a href="index.php">
                            <img src="assets/media/logo.png" alt="ready4stage">
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

-->