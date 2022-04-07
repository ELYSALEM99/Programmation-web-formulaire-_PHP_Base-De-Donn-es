<?php
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
    <!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
        <a href="#index" onclick="w3_close()" class="w3-bar-item w3-button">Question</a>
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
    </nav>
    <!-- Top menu -->
    <div class="w3-top">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
            <div class="w3-center w3-padding-16">Form</div>
        </div>
    </div>
    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-content w3-padding" style="max-width:1200px">
        <!-- First Photo Grid-->
        <div class="w3-container w3-blue">
            <h2>Input Form</h2>
        </div>
        <form action="#" method="POST" class="w3-container">
            <input type="hidden" id="debut" name="TempsConnexionMinute" value="">
            <p>
                <label>login*</label>
                <input class="w3-input" id="login" type="password"  placeholder="login"  value="" pattern="[A-Za-z0-9]{1,32}" name="login" required />
            </p>
            <p>
                <label>Email*</label>
                <input class="w3-input" id="Em" type="mail" name="em" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="" required />
            </p>
            <p>
                <label>Password*</label>
                <input class="w3-input" id="pw1" type="password" value="" placeholder="UpperCase, LowerCase,Number/SpecialChar and min 8 Chars" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required name="pwd" onchange="this.pwd2.pattern=this.value;" />
            </p>
            <input class="w3-input" name="v1" type="submit"  value="valider" required />
        </form>
        <script>
            let debut = Date.now();
            document.getElementById('debut').value = debut;
        </script>
        <!-- Second Photo Grid-->
        <div class="w3-row-padding w3-padding-16 w3-center">
        </div>
        <!-- Pagination -->
        <div class="w3-center w3-padding-32">
            <div class="w3-bar">
                <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
                <a href="#" class="w3-bar-item w3-black w3-button">1</a>
                <a href="part2.php" class="w3-bar-item w3-button w3-hover-black">2</a>
                <a href="part3.php" class="w3-bar-item w3-button w3-hover-black">3</a>
                <a href="part2.php" class="w3-bar-item w3-button w3-hover-black">»</a>
            </div>
        </div>
        <hr id="about">
        <!-- About Section -->
        <div class="w3-container w3-padding-32 w3-center">
            <h3>About Me ... </h3><br>
            <div class="w3-padding-32">
            </div>
        </div>
        <hr>
        <!-- Footer -->
        <footer class="w3-row-padding w3-padding-32">
            <div class="w3-third">
                <h3>FOOTER</h3>
            </div>
            <div class="w3-third w3-serif">
                <h3>POPULAR TAGS</h3>
            </div>
        </footer>
        <!-- End page content -->
    </div>
    <script>
        // Script to open and close sidebar
        function w3_open() {
            // document.getElementById("mySidebar").style.display = "block";
            var test = document.getElementById("mySidebar");
            test.style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
     <?php
    if (isset($_POST['v1'])) {
        
        $_SESSION['tab1'] = $_POST;
        ?>
        <script>
            window.location = "part2.php"
        </script>
<?php
       
    }
    ?>

</body>

</html>