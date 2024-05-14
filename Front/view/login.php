<?php
session_start();

require_once '../view/functions.php';
//reconnect_auto_user();
include_once "../config.php";
?>

<head>
    <title>AdventureHub</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>
    <link rel="icon" href="image/logo.png" type="image/png">
    <script>
        // Récupérer la valeur de userType de l'URL
        var urlParams = new URLSearchParams(window.location.search);
        var userType = urlParams.get('userType');

        // Sélectionner le champ de formulaire hidden avec l'ID "userType"
        var userTypeField = document.getElementById('userType');

        // Assurez-vous que userTypeField existe et que la valeur de userType est définie
        if (userTypeField && userType) {
            // Assigner la valeur de userType au champ de formulaire hidden
            userTypeField.value = userType;
        }

    </script>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><img src="image/logo.png" alt="AdventureHub logo"
                    width="40px">AdventureHub</a>
        </div>
    </div>
    <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <div class="slick-carousel">
            <div><img src="image/bgphoto.jpg" alt="Image 1" width="1500" height="800"></div>
            <div><img src="image/1.jpg" alt="Image 2" width="1500" height="800"></div>
            <div><img src="image/2.jpg" alt="Image 3" width="1500" height="800"></div>
            <div><img src="image/8.jpg" alt="Image 4" width="1500" height="800"></div>
        </div>
        <div class="w3-display-middle w3-margin-top w3-center">
            <div class="pt-105 pb-110 bg_cover" class="row">
                <center>
                    <h2>Se Connecter</h2>
                    <br>
                    <div class="main-form pt-45">
                        <center>
                            <form action="http://localhost/gestion_users/Front/controller/loginController.php"
                                method="post">
                                <div>

                                    <label for="userType" style="font-weight: bold; font-size: 1.5em;">Join as:</label>
                                    <select name="userType" id="userType" style="width: 9em; height: 2em;"
                                        value="select">
                                        <option value="select"></option>
                                        <option value="user">Utilisateur</option>
                                        <option value="agence">Agence</option>
                                    </select>
                                </div>
                                <span id="error_userType" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <div class="col-md-6">
                            <div class="singel-form form-group">
                                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                                <input type="text" name="email" id="email" placeholder="email"
                                    style="height: 3.25rem; width: 15rem; border-radius: 5px;">
                            </div>
                        </div>
                        <span id="error_email" style="color: red; font-size: 0.75em;"></span>
                        <br>
                        <div class="col-md-6">
                            <label for="password">
                                <a
                                    href="http://localhost/gestion_users/Front/view/remember.php?userType=<?php echo isset($_GET['userType']) ? $_GET['userType'] : ''; ?>">
                                    J'AI OUBLIE MON PASSWORD
                                </a>

                            </label>

                            <div class="singel-form form-group">
                                <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                                <input type="password" name="password" id="password" placeholder="Mot de passe"
                                    style="height: 3.25rem; width: 15rem; border-radius: 5px;">
                            </div>
                        </div>
                        <span id="error_password" style="color: red; font-size: 0.75em;"></span>
                        <br>
                        <div id="errorMessage" style="color: red; font-size: 0.75em;"></div>
                        <div class="singel-form form-group">
                            <label for="password" style="color: gray;">
                                <input type="checkbox" name="remember" value="1">
                            </label>
                            <span style="color: gray;">Se souvenir de moi</span>
                        </div>
                        <br>
                        <div class="g-recaptcha" data-sitekey="6LcWnJ8dAAAAAMD9J3fK1MNsAaF8AIdqZYmTCjz_"></div>
                        <br>
                        <input type="submit" value="Se connecter" id="submitButton" class="main-btn">
                        </form>
                    </div>
                    <br>
                    </form>
                </center>
            </div>
        </div>
    </header>
    <footer class="w3-center w3-black w3-padding-16">
        <h1 class="w3-xxlarge w3-text-white"><img src="image/logo white.png" alt="logo white" width="80px"> AdventureHub
        </h1>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>  
    <script>
        $(document).ready(function(){
            $('.slick-carousel').slick({
                autoplay: true, // Défilement automatique
                autoplaySpeed: 2000, // Vitesse de défilement en millisecondes
                arrows: false, // Masquer les flèches de navigation
                dots: true // Afficher les indicateurs de pagination
            });
        });
    </script>
</body>

