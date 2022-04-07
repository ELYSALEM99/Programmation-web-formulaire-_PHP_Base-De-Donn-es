<?php
include_once 'UserCls.php';
session_start();
?>
<!DOCTYPE html>
<html>
<title>Form with W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Karma", sans-serif
    }

    .w3-bar-block .w3-bar-item {
        padding: 20px
    }
</style>

<body>
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
    </nav>
    <div class="w3-top">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-center w3-padding-16">Form </div>
        </div>
    </div>
    <div class="w3-main w3-content w3-padding" style="max-width:1200px">

        <div class="w3-container w3-blue">
            <h2> Input Form </h2>
        </div>
        <div class="w3-container">
            <p>
                <button onclick="getLocation()">Show Localisation Navigator Infos</button>
            </p>
        </div>

        <form method="POST" action="#" class="w3-container">
            <p>
                <label>Url de site</label>
                <input class="w3-input" id="url" type="url" placeholder="Url" value=" " name="url" />
            </p>
            <p>
                <label>Comptes réseaux sociaux</label>
                <input class="w3-input" id="compte" type="text" placeholder="Compte" value=" " name="compte" />
            </p>
            <p>
                <label>Couleur préférée</label>
                <input class="w3-input" id="couleur" type="color" placeholder="Couleur" value=" " name="couleur" />
            </p>
            <p>
                <label>
                    Animal de compagnie
                </label>
            <p class="w3-input" id="rad" name="rad">
            </p>
            </p>
            <p>
                <label>Lobby</label>
                <input class="w3-input" id="lobby" type="text" value=" " placeholder="Lobby" name="lobby" />
            </p>
            <input class="w3-input" name="v3" type="submit" value="valider" />
        </form>

        <div class="w3-row-padding w3-padding-16 w3-center">
        </div>
        <!-- Pagination -->
        <div class="w3-center w3-padding-32">
            <div class="w3-bar">
                <a href="part2.php" class="w3-bar-item w3-button w3-hover-black">«</a>
                <a href="part1.php" class="w3-bar-item w3-hover-black w3-button">1</a>
                <a href="part2.php" class="w3-bar-item w3-button w3-hover-black">2</a>
                <a href="#" class="w3-bar-item w3-button w3-black ">3</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
            </div>
        </div>
    </div>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(redirectToPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function redirectToPosition(position) {
            var appname = navigator.appName;
            var appcodename = navigator.appCodeName;
            var prod = navigator.product;
            var user = navigator.userAgent;
            window.location = 'part3.php?appName=' + appname + '&appCodeName=' + appcodename + '&product=' + prod + '&userAgent=' + user + '&lat=' + position.coords.latitude + '&long=' + position.coords.longitude;
        }
    </script>

    <script>
        var xhr2 = new XMLHttpRequest();
        xhr2.open('GET', 'animal.json');
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState === 4) {
                var reponse = JSON.parse(xhr2.responseText);
                select = document.getElementById("rad");
                var i = 0;
                var radio = ""
                for (var nom_clee in reponse) {
                    i++;
                    radio += "<input type='radio' id='myradio_" + i + "' name='animal' value='" + reponse[nom_clee] + "' />" + reponse[nom_clee] + "<br>"
                }
                document.getElementById("rad").innerHTML = radio;
            }
        };
        xhr2.send();
    </script>




    <?php

    $appname = (isset($_GET['appName'])) ? $_GET['appName'] : '';
    $appcodename = (isset($_GET['appCodeName'])) ? $_GET['appCodeName'] : '';
    $prod = (isset($_GET['product'])) ? $_GET['product'] : '';
    $user = (isset($_GET['userAgent'])) ? $_GET['userAgent'] : '';
    $lat = (isset($_GET['lat'])) ? $_GET['lat'] : '';
    $long = (isset($_GET['long'])) ? $_GET['long'] : '';

    $tabInfos = array(
        "appName" => $appname,
        "appCodeName" => $appcodename,
        "product" => $prod,
        "userAgent" => $user,
        "lat" => $lat,
        "lon" => $long
    );

    if (isset($_POST['v3'])) {
        $_SESSION['tab3'] = $_POST;
        $tab = array_merge($_SESSION['tab1'], $_SESSION['tab2'], $_SESSION['tab3'], $tabInfos);

        $password1 = preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $tab['pwd']);
        $email = preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/", $tab['em']);
        $login = preg_match("/[A-Za-z0-9]{1,32}/", $tab['login']);
        $nom = preg_match("/[A-Za-z]{1,32}/", $tab['nom']);
        $prenom = preg_match("/[A-Za-z]{1,32}/", $tab['prenom']);
        $date = preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $tab['date_naissance']);
        if ((!filter_var($tab['url'], FILTER_VALIDATE_URL)) && (!empty($tab['url']))) {
            echo "erreur";
        } else if (!$email) {
            echo "erreur";
        } else if (!$password1) {
            echo "erreur";
        } else if (!$login) {
            echo "erreur";
        } else if (!$nom) {
            echo "erreur";
        } else if (!$prenom) {
            echo "erreur";
        } else if (!$date) {
            echo "erreur";
        } else {
            $fin = '<script>document.write(Date.now())</script>';
            $fin = time() * 1000;
            $tempsconn = $fin - (int)$tab['TempsConnexionMinute'];
            $tm = $tempsconn / 60000;
            $tab['TempsConnexionMinute'] = $tm;
            var_dump($tab);
            if(!isset($tab['animal']))
            {
                $animal="";
                $tab1=array("animal"=> $animal);
                $tab = array_merge($tab, $tab1);
            }
            $u = new UserCls($tab);
            $u->save_DB();
            echo 'le login est : ' . $u->getTempsConnexionMinute();
        }
    }
    ?>
</body>

</html>