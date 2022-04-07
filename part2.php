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
        <form method="POST" action="#" class="w3-container">
            <p>
                <label>Nom*</label>
                <input class="w3-input" id="nom" type="text" placeholder="Nom" pattern="[A-Za-z]{1,32}" name="nom" required />
            </p>
            <p>
                <label>Prénom*</label>
                <input class="w3-input" id="prenom" type="text" placeholder="Prénom" pattern="[A-Za-z]{1,32}" required name="prenom" />
            </p>
            <p>
                <label>Date de naissance*</label>
                <input class="w3-input" id="date_naissance" type="date" placeholder="Date de naissance" name="date_naissance" required />
            </p>
            <p>
                <label>Adresse*</label>
                <select class="w3-input" id="liste" name="adresse" required>
                    <option>--Please choose your country--</option>
                </select>
            </p>
            <input class="w3-input" name="v2" type="submit" value="valider" required />
        </form>

        <div class="w3-row-padding w3-padding-16 w3-center">
        </div>
        <!-- Pagination -->
        <div class="w3-center w3-padding-32">
            <div class="w3-bar">
                <a href="part1.php" class="w3-bar-item w3-button w3-hover-black">«</a>
                <a href="part1.php" class="w3-bar-item w3-hover-black w3-button">1</a>
                <a href="#" class="w3-bar-item w3-button w3-black ">2</a>
                <a href="part3.php" class="w3-bar-item w3-button w3-hover-black">3</a>
                <a href="part3.php" class="w3-bar-item w3-button w3-hover-black">»</a>
            </div>
        </div>
    </div>
    <script>
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://gist.githubusercontent.com/revolunet/6173043/raw/222c4537affb1bdecbabcec51143742709aa0b6e/countries-FR.json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                var reponse = JSON.parse(xhr.responseText);
                //alert(reponse.AF);
                select = document.getElementById("liste");
                for (var nom_clee in reponse) {
                    console.log(reponse[nom_clee])
                    var option = document.createElement("option");
                    option.text = reponse[nom_clee];
                    select.appendChild(option);
                }
            }
        };
        xhr.send();
    </script>

    <?php
    if (isset($_POST['v2'])) {
        session_start();
        $_SESSION['tab2'] = $_POST;
        header('location:part3.php');
    }

    ?>

</body>

</html>