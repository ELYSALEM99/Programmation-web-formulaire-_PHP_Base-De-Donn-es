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
            <input type="hidden" id="debut" name="TempsConnexionMinute" value="">
            <div id="div1">
                <p>
                    <label>login*</label>
                    <input class="w3-input" id="Lo" type="text" name="lo" placeholder="login" value="" required />
                </p>
                <p>
                    <label>Email*</label>
                    <input class="w3-input" id="Em" type="mail" name="em" placeholder="email" value="" required />
                </p>
                <p>
                    <label>Password*</label>
                    <input class="w3-input" id="pw1" type="password" value="" placeholder="UpperCase, LowerCase,Number/SpecialChar and min 8 Chars" required name="pwd1" onchange="this.pwd2.pattern =this.value;" />
                </p>
                <p>
                    <label>Confirm password*</label>
                    <input class="w3-input" id="pw2" type="password" value="" name="pwd2" required />
                </p>
                <button class="w3-input" id="btn1" type="submit"   > 1/3 suivant ></button>
            
            </div>

            <div id="div2">
                <p>
                    <label>Nom*</label>
                    <input class="w3-input" type="text" placeholder="Nom" name="nom" required />
                </p>
                <p>
                    <label>Prénom*</label>
                    <input class="w3-input" type="text" placeholder="Prénom" required name="prenom" />
                </p>
                <p>
                    <label>Date de naissance*</label>
                    <input class="w3-input" type="date" placeholder="Date de naissance" name="date_naissance" required />
                </p>
                <p>
                    <label>Adresse*</label>
                    <!-- <input class="w3-input" type="text" placeholder="Adresse" name="adresse" required /> -->
                    <select class="w3-input" id="liste" name="adresse" required>
                        <option>--Please choose your country--</option>
                    </select>
                </p>
                <button class="w3-input" id="btn2" type="submit"   > 2/3 suivant ></button>
            </div>


            <div id="div3">
                <p>
                    <label>Url de site</label>
                    <input class="w3-input" type="url" placeholder="Url" name="url" />
                </p>
                <p>
                    <label>Comptes réseaux sociaux</label>
                    <input class="w3-input" type="text" placeholder="Compte" name="compte" />
                </p>
                <p>
                    <label>Couleur préférée</label>
                    <input class="w3-input" type="color" placeholder="Couleur" name="couleur" />
                </p>
                <p>
                    <label>Animal de compagnie</label>
                    <!-- <input class="w3-input" type="text" placeholder="animal" name="animal" /> -->
                <p class="w3-input" id="rad" name="rad"> </p>
                </p>
                <p>
                    <label>Lobby</label>
                    <input class="w3-input" type="text" placeholder="Lobby" name="lobby" />
                </p>
                <input class="w3-input" name="v3" type="submit" value="valider" />
            </div>
        </form>
    </div>

    <script>
        let debut = Date.now();
        document.getElementById('debut').value = debut;
    </script>

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

    <script>
        var xhr2 = new XMLHttpRequest();
        xhr2.open('GET', 'animal.json');
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState === 4) {
                var reponse = JSON.parse(xhr2.responseText);
                //alert(reponse.AF);
                select = document.getElementById("rad");
                var i = 0;
                var radio = ""
                for (var nom_clee in reponse) {
                    i++;
                    console.log(reponse[nom_clee])
                    radio += "<input type='radio' id='myradio_" + i + "' name='radiobutton' value='" + i + "' />" + reponse[nom_clee] + "<br>"
                }
                document.getElementById("rad").innerHTML = radio;
            }
        };
        xhr2.send();

        

        /*if (div.style.display !== 'none') {
            div.style.display = 'none';
        }
        else {
            div.style.display = 'block';
            }*/
    </script>

</body>

<script>
        div1 = document.getElementById('div1');
        div2 = document.getElementById('div2');
        div3 = document.getElementById('div3');

        div2.style.display = 'none';        
        div3.style.display = 'none';

        btn1 = document.getElementById('btn1'); 
        btn2 = document.getElementById('btn2'); 

        btn1.onclick = function() {            
            div1.style.display= 'none';
            div2.style.display='block'            
        };

        btn2.onclick = function() {            
            div2.style.display= 'none';
            div3.style.display='block';
            div1.style.display= 'none';          
        };
</script>

<?php //echo  $reponse['txt_msg']; 

if(isset($_POST['v3']))
{
    var_dump($_POST);
}
?>

</html>