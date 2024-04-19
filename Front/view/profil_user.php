<?php
session_start();
?>
<div class="pt-105 pb-110 bg_cover" class="row">

    <center>
        <h2>My Profile</h2>
    </center>
    <br>
    <!------      ============FORM PART STARTS=========== ---------->
    <div class="main-form pt-45">
        <div class="main-form pt-45">
            <form id="prenomForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
                style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

                <center>
                    <h3>Votre Prénom</h3>
                </center>
                <br>
                <div class="col-md-6">
                    <div class="singel-form form-group">
                        <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

                        <label for="actualPrenom" style="font-weight: bold; font-size: 1.5em;">Actuel Prenom:</label>
                        <input type="text" name="actualPrenom" id="actualPrenom"
                            placeholder="<?php echo $_SESSION['prenom']; ?>"
                            style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;"
                            readonly>

                        <br>
                        <!-- <br> -->
                        <label for="newPrenom" style="font-weight: bold; font-size: 1.5em;"> Nouveau Prénom : </label>
                        <center><input type="text" name="newPrenom" id="newPrenom" placeholder="Actuel Prenom"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                            <br><span id="error_newPrenom" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <!-- <br> -->

                        <center><input type="submit" value="Change My prenom" id="submitButtonPrenom" class="main-btn">
                        </center>

                    </div>
                </div>
            </form>
        </div>
        <br>
        <!-- <br> -->
        <form id="nomForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
            style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

            <center>
                <h3>Votre Nom</h3>
            </center>
            <br>
            <div class="col-md-6">
                <div class="singel-form form-group">
                    <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

                    <label for="actualNom" style="font-weight: bold; font-size: 1.5em;">Actuel Nom:</label>
                    <input type="text" name="actualNom" id="actualNom" placeholder="<?php echo $_SESSION['nom']; ?>"
                        style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;"
                        readonly>

                    <br>
                    <!-- <br> -->
                    <label for="newNom" style="font-weight: bold; font-size: 1.5em;"> Nouveau Nom : </label>
                    <center><input type="text" name="newNom" id="newNom" placeholder="Nouveau Nom"
                            style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                        <br><span id="error_newNom" style="color: red; font-size: 0.75em;"></span>
                    </center>
                    <br>
                    <!-- <br> -->

                    <center><input type="submit" value="Change My Nom" id="submitButtonNom" class="main-btn">
                    </center>

                </div>
            </div>
        </form>
    </div>
    <br>
    <!-- <br> -->
    <form id="usernameForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
        style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

        <center>
            <h3>Votre Username</h3>
        </center>
        <br>
        <div class="col-md-6">
            <div class="singel-form form-group">
                <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

                <label for="actualUsername" style="font-weight: bold; font-size: 1.5em;">Actuel Username:</label>
                <input type="text" name="actualUsername" id="actualUsername"
                    placeholder="<?php echo $_SESSION['username']; ?>"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;" readonly>

                <br>
                <!-- <br> -->
                <label for="newUsername" style="font-weight: bold; font-size: 1.5em;"> Nouveau Username : </label>
                <center><input type="text" name="newUsername" id="newUsername" placeholder="Nouveau Username"
                        style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                    <br><span id="error_newUsername" style="color: red; font-size: 0.75em;"></span>
                </center>
                <br>
                <!-- <br> -->

                <center><input type="submit" value="Change My User Name" id="submitButtonUserName" class="main-btn">
                </center>

            </div>
        </div>
    </form>
</div>
<br>
<!-- <br> -->

<!-- <br> -->
<form id="emailForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
    style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">


    <center>
        <h3>Votre Email</h3>
    </center>
    <br>
    <div class="col-md-6">
        <div class="singel-form form-group">
            <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->
            <label for="actualEmail" style="font-weight: bold; font-size: 1.5em;">Actuel Email:</label>
            <center><input type="email" name="actualEmail" id="actualEmail"
                    placeholder="<?php echo $_SESSION['email']; ?>"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;" readonly></center>
            <br>
            <!-- <br> -->
            <label for="newEmail" style="font-weight: bold; font-size: 1.5em;"> Nouveau Email : </label>
            <center><input type="email" name="newEmail" id="newEmail" placeholder="Nouveau Email"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                <br><span id="error_newEmail" style="color: red; font-size: 0.75em;"></span>
            </center>
            <br>
            <!-- <br> -->
            <center><input type="submit" value="Change My Email" id="submitButtonEmail" class="main-btn">
            </center>

        </div>
    </div>

</form>
</div>
<br>
<!-- <br> -->

<form id="dobForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
    style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

    <center>
        <h3>Votre Date de Naissance</h3>
    </center>
    <br>
    <div class="col-md-6">
        <div class="singel-form form-group">
            <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

            <label for="actualDob" style="font-weight: bold; font-size: 1.5em;">Ancien Dob:</label>
            <input type="text" name="actualDob" id="actualDob" placeholder="<?php echo $_SESSION['dob']; ?>"
                style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;" readonly>

            <br>
            <!-- <br> -->
            <label for="newDob" style="font-weight: bold; font-size: 1.5em;"> Nouvelle Dob : </label>
            <center><input type="text" name="newDob" id="newDob" placeholder="Nouvelle Dob"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                <br><span id="error_newDob" style="color: red; font-size: 0.75em;"></span>
            </center>
            <br>
            <!-- <br> -->

            <center><input type="submit" value="Change Ma Date de Naissance" id="submitButtonDob" class="main-btn">
            </center>

        </div>
    </div>
</form>
</div>
<br>
<!-- <br> -->
<form id="adresseForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
    style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

    <center>
        <h3>Votre Adresse</h3>
    </center>
    <br>
    <div class="col-md-6">
        <div class="singel-form form-group">
            <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

            <label for="actualAdresse" style="font-weight: bold; font-size: 1.5em;">Ancienne Adresse:</label>
            <input type="text" name="actualAdresse" id="actualAdresse" placeholder="<?php echo $_SESSION['adresse']; ?>"
                style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;" readonly>

            <br>
            <!-- <br> -->
            <label for="newAdresse" style="font-weight: bold; font-size: 1.5em;"> Nouvelle Adresse : </label>
            <center><input type="text" name="newAdresse" id="newAdresse" placeholder="Nouvelle Adresse "
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                <br><span id="error_newAdresse" style="color: red; font-size: 0.75em;"></span>
            </center>
            <br>
            <!-- <br> -->

            <center><input type="submit" value="Change Mon adresse" id="submitButtonAdresse" class="main-btn">
            </center>

        </div>
    </div>
</form>
</div>
<br>
<!-- <br> -->
<form id="numeroForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
    style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

    <center>
        <h3>Votre Numéro</h3>
    </center>
    <br>
    <div class="col-md-6">
        <div class="singel-form form-group">
            <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

            <label for="actualNumero" style="font-weight: bold; font-size: 1.5em;">Actuel Numero:</label>
            <input type="text" name="actualNumero" id="actualNumero" placeholder="<?php echo $_SESSION['numero']; ?>"
                style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;" readonly>

            <br>
            <!-- <br> -->
            <label for="newNumero" style="font-weight: bold; font-size: 1.5em;"> Nouveau Numero : </label>
            <center><input type="text" name="newNumero" id="newNumero" placeholder="Nouveau Numero"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                <br><span id="error_newNumero" style="color: red; font-size: 0.75em;"></span>
            </center>
            <br>
            <!-- <br> -->

            <center><input type="submit" value="Change Mon Numero" id="submitButtonNumero" class="main-btn">
            </center>

        </div>
    </div>
</form>
</div>
<br>

<form id="imageForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post" enctype="multipart/form-data" style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

<center>
    <h3>Votre Image</h3>
</center>
<br>
<div class="col-md-6">
    <div class="singel-form form-group">
        <label for="actualImage" style="font-weight: bold; font-size: 1.5em;">Actuelle Image:</label>
        <?php echo $_SESSION['image'];
         if (isset($_SESSION['image'])): ?>
            <img src="<?php echo $_SESSION['image']; ?>" style="max-width: 300px; height: auto; display: block; margin: 0 auto;" alt="Image actuelle">
        <?php endif; ?>
        <br>
        <!-- <br> -->
        <label for="newImage" style="font-weight: bold; font-size: 1.5em;"> Nouvelle Image : </label>
        <center><input type="file" name="newImage" id="newImage" accept="image/*" style="height: 3.25rem; width: 33vw; border-radius: 5px;">
            <br><span id="error_newImage" style="color: red; font-size: 0.75em;"></span>
        </center>
        <br>
        <!-- <br> -->

        <center><input type="submit" value="Changer Mon Image" id="submitButtonImage" class="main-btn">
        </center>

        <input type="hidden" name="userType" id="userType" value="<?php echo $_SESSION['type']; ?>" />
    </div>
</div>
</form>




<form id="passwordForm" action="http://localhost/gestion_users/Front/controller/UpdateUsers.php" method="post"
    style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

    <center>
        <h3>Votre Mot de passe</h3>
    </center>
    <br>
    <div class="col-md-6">
        <div class="singel-form form-group">
            <label for="oldPassword" style="font-weight: bold; font-size: 1.5em;">Ancien Password :</label>
            <input type="password" name="oldPassword" id="oldPassword" placeholder="Ancien Password"
                style="height: 3.25rem; width: 33vw; border-radius: 5px;" value="<?php echo $_SESSION['password']; ?>"
                readonly>
            <br>
            <label for="newPassword" style="font-weight: bold; font-size: 1.5em;"> Nouveau Password : </label>
            <center><input type="password" name="newPassword" id="newPassword" placeholder="Nouveau Password" 
                      style="height: 3.25rem; width: 33vw; border-radius: 5px;">

                <br><span id="error_newPassword" style="color: red; font-size: 0.75em;"></span>
            </center>
            <br>
            <!-- <br> -->
            <label for="confirmPassword" style="font-weight: bold; font-size: 1.5em;"> Confirmer Password : </label>
            <center><input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmer Password"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                <br><span id="error_confirmPassword" style="color: red; font-size: 0.75em;"></span>
            </center>
            <br>
            <!-- <br> -->
            <center><input type="submit" value="Change mon Password" id="submitButtonPassword" class="main-btn">
            </center>

        </div>
    </div>

</form>
<br>


<div style="margin-left: 20vw;">
    <a href="http://localhost/gestion_users/Front/controller/DeleteUsers.php"><input type="button" class="main-btn"
            name="delateAccount" value="Delete My Account"></a>
</div>
<br>
<br>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>






<script>
    var changePrenom = document.getElementById('submitButtonPrenom');
    var changeNom = document.getElementById('submitButtonNom');
    var changeUserName = document.getElementById('submitButtonUserName');
    var changeEmail = document.getElementById('submitButtonEmail');
    var changeDob = document.getElementById('submitButtonDob');
    var changeAdresse = document.getElementById('submitButtonAdresse');
    var changeNumero = document.getElementById('submitButtonNumero');
    var changeImage = document.getElementById('submitButtonImage');
    var changePassword = document.getElementById('submitButtonPassword');
    var emailRegex =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var newPrenom = document.getElementById('newPrenom');
    var newNom = document.getElementById('newNom');
    var newUserName = document.getElementById('newUsername');
    var newEmail = document.getElementById('newEmail');
    var newDob = document.getElementById('newDob');
    var newAdresse = document.getElementById('newAdresse');
    var newNumero = document.getElementById('newNumero');
    var newImage = document.getElementById('newImage');
    var oldpassword = document.getElementById('oldPassword');
    var newPassword = document.getElementById('newPassword');
    var newPasswordConfirm = document.getElementById('confirmPassword');
    var error_newPrenom = document.getElementById('error_newPrenom');
    var error_newNom = document.getElementById('error_newNom');
    var error_newUserName = document.getElementById('error_newUserName');
    var error_newEmail = document.getElementById('error_newEmail');
    var error_newDob = document.getElementById('error_newDob');
    var error_newAdresse = document.getElementById('error_newAdresse');
    var error_newNumero = document.getElementById('error_newNumero');
    var error_newImage = document.getElementById('error_newImage');
    var error_newPassword = document.getElementById('error_newPassword');
    var error_confirmPassword = document.getElementById('error_confirmPassword');
    var error_oldPassword = document.getElementById('error_oldPassword');

    changePrenom.addEventListener('click', (event) => {
        if (newPrenom.value.length == 0 || !/^[a-zA-Z]+$/.test(newPrenom.value))
            error_newPrenom.innerHTML = "Enter a new valid Prenom address";
        else
            error_newPrenom.innerHTML = "";

        if (error_newPrenom.innerHTML != "")
            event.preventDefault();
    });

    changeNom.addEventListener('click', (event) => {
        if (newNom.value.length == 0 || !/^[a-zA-Z]+$/.test(newNom.value))
            error_newNom.innerHTML = "Enter a new valid nom address";
        else
            error_newNom.innerHTML = "";

        if (error_newNom.innerHTML != "")
            event.preventDefault();
    });

    changeUserName.addEventListener('click', (event) => {

        if (newUserName.value.length == 0 || !/^[a-zA-Z]+$/.test(newUserName.value))
            error_newUserName.innerHTML = "Enter a new UserName";
        else
            error_newUserName.innerHTML = "";

        if (error_newUserName.innerHTML != "")
            event.preventDefault();
    });

    changeEmail.addEventListener('click', (event) => {
        if (newEmail.value.length == 0 || !emailRegex.test(newEmail.value))
            error_newEmail.innerHTML = "Enter a new valid email address";
        else
            error_newEmail.innerHTML = "";

        if (error_newEmail.innerHTML != "")
            event.preventDefault();
    });
    changeDob.addEventListener('click', (event) => {
        if (newDob.value.length == 0 || !/^\d{4}-\d{2}-\d{2}$/.test(newDob.value))
            error_newDob.innerHTML = "Enter a new valid Dob address";
        else
            error_newDob.innerHTML = "";

        if (error_newDob.innerHTML != "")
            event.preventDefault();
    });
    changeAdresse.addEventListener('click', (event) => {
        if (newAdresse.value.length == 0)
            error_newAdresse.innerHTML = "Enter a new valid email address";
        else
            error_newAdresse.innerHTML = "";

        if (error_newAdresse.innerHTML != "")
            event.preventDefault();
    });
    changeNumero.addEventListener('click', (event) => {
        if (newNumero.value.length == 0 || !/^\d+$/.test(newNumero.value))
            error_newNumero.innerHTML = "Enter a new valid email address";
        else
            error_newNumero.innerHTML = "";

        if (error_newNumero.innerHTML != "")
            event.preventDefault();
    });

    changeImage.addEventListener('click', (event) => {
        if (newImage.value.length == 0)
            error_newImage.innerHTML = "Enter a new valid Image address";
        else
            error_newImage.innerHTML = "";

        if (error_newImage.innerHTML != "")
            event.preventDefault();
    });

    changePassword.addEventListener('click', (event) => {

        error_newPassword.innerHTML = "";
        error_confirmPassword.innerHTML = "";
        error_oldPassword.innerHTML = "";

        if (oldPassword.value.length == 0)
            error_oldPassword.innerHTML = "Enter your old password";
        else if (oldPassword.value.length > 0 && oldPassword.value.length < 8)
            error_oldPassword.innerHTML = "old password cannot have less than 8 characters";

        if (newPassword.value.length == 0)
            error_newPassword.innerHTML = "Enter a new Password";
        else if (newPassword.value.length > 0 && newPassword.value.length < 8)
            error_newPassword.innerHTML = "Your new password must contain at least 8 characters";

        if (newPassword.value.length >= 8 && newPasswordConfirm.value.length == 0)
            error_confirmPassword.innerHTML = "Confirm your new password";
        else if (newPassword.value.length >= 8 && newPasswordConfirm.value != newPassword.value)
            error_confirmPassword.innerHTML =
                "new password confirmation is different from new password";


        if (error_newPassword.innerHTML != "" || error_confirmPassword.innerHTML != "" ||
            error_oldPassword.innerHTML != "")
            event.preventDefault();
    });

    function onLoad() {

        var url = window.location.href;
        var regexError3 = /error=3/;


        if (regexError3.test(url)) {
            error_oldPassword.innerHTML = "Wrong password";
        } else
            loginError.innerHTML = "";
    }
</script>