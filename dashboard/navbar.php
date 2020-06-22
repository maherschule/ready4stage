<?php


$navs = [
    "index.php" => [
        "posi" => "links",
        "name" => "Home",
        "icon" => false,
        "active" => "active"
    ],
    "kurs.php" => [
        "posi" => "links",
        "name" => "Kurs",
        "icon" => false,
        "active" => ""
    ],
    "raum.php" => [
        "posi" => "links",
        "name" => "Raum",
        "icon" => false,
        "active" => ""
    ],
    "dozent.php" => [
        "posi" => "links",
        "name" => "Dozent",
        "icon" => false
    ],
    "schueler.php" => [
        "posi" => "links",
        "name" => "Schüler",
        "icon" => false,
        "active" => ""
    ],
    "verwalter.php" => [
        "posi" => "links",
        "name" => "Verwalter",
        "icon" => false,
        "active" => ""
    ],
    "" => [
        "posi" => "rechts",
        "name" => "(" . $_SESSION['Benutzer']['Benutzername'] . ")",
        "icon" => false,
        "active" => ""
    ],
    "logout.php" => [
        "posi" => "rechts",
        "name" => "Abmelden",
        "icon" => false,
        "active" => ""
    ],
    
];
$linksNav = '';
$rechtsNav = '';

foreach($navs as $href => $detail){
    if($detail['posi'] === 'links'){
        $linksNav .= '<li class="nav-item '.$detail['active'].'">';
        $linksNav .= '<a class="nav-link" href="'.$href.'">'.$detail['name'].' <span class="sr-only">(current)</span></a>';
        $linksNav .= '</li>';
    }else{
        $rechtsNav .= '<li class="nav-item '.$detail['active'].'">';
        $rechtsNav .= '<a class="nav-link" href="'.$href.'">'.$detail['name'].'</a>';
        $rechtsNav .= '</li>';
    }

}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="assets/media/logo.png" width="40" height="" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php echo $linksNav ;?>

    </ul>
    <ul class="navbar-nav ml-auto">
    <?php echo $rechtsNav ;?>
    </ul>
  </div>


</nav>
