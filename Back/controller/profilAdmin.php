<?php
session_start();
?>
<div class="pt-105 pb-110 bg_cover" class="row">

    <center>
        <h2>My Profile</h2>
    </center>
    <br>
    <!------      ============FORM PART STARTS=========== ---------->
    <<div class="main-form pt-45">
        <form id="usernameForm" action="http://localhost/gestion_users/Back/controller/UpdateAdmin.php" method="post"
            style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

            <center>
                <h3>Votre Username</h3>
            </center>
            <br>
            <div class="col-md-6">
                <div class="singel-form form-group">
                    <label for="actualUsername" style="font-weight: bold; font-size: 1.5em;">Actuel Username:</label>
                    <input type="text" name="actualUsername" id="actualUsernameInput"
                        value="<?php echo $_SESSION['username']; ?>"
                        style="height: 3.25rem; width: 33vw; border-radius: 5px; display: block; margin: 0 auto;"
                        readonly>
                    <br>
                    <label for="newUsername" style="font-weight: bold; font-size: 1.5em;"> Nouveau Username : </label>
                    <center><input type="text" name="newUsername" id="newUsername" placeholder="Nouveau Username"
                            style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                        <br><span id="error_newUsername" style="color: red; font-size: 0.75em;"></span>
                    </center>
                    <br>
                    <center><input type="submit" value="Change My User Name" id="submitButtonUserName" class="main-btn">
                    </center>
                </div>
            </div>
        </form>
</div>
<!-- <br> -->

<!-- <br> -->
<div class="main-form pt-45">
    <form id="emailForm" action="http://localhost/gestion_users/Back/controller/UpdateAdmin.php" method="post"
        style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">


        <center>
            <h3>Votre Email</h3>
        </center>
        <br>
        <div class="col-md-6">
            <div class="singel-form form-group">
                <label for="actualEmail" style="font-weight: bold; font-size: 1.5em;">Actuel Email:</label>
                <input type="email" name="actualEmail" id="actualEmailInput" value="<?php echo $_SESSION['email']; ?>"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;" readonly>
                <br>
                <label for="newEmail" style="font-weight: bold; font-size: 1.5em;"> Nouveau Email : </label>
                <center><input type="email" name="newEmail" id="newEmail" placeholder="Nouveau Email"
                        style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                    <br><span id="error_newEmail" style="color: red; font-size: 0.75em;"></span>
                </center>
                <br>
                <center><input type="submit" value="Change My Email" id="submitButtonEmail" class="main-btn">
                </center>

            </div>
        </div>

    </form>
</div>
<br>

<div class="main-form pt-45">
    <form id="imageForm" action="http://localhost/gestion_users/Back/controller/UpdateAdmin.php" method="post"
        enctype="multipart/form-data"
        style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

        <center>
            <h3>Votre Image</h3>
        </center>
        <br>
        <div class="col-md-6">
            <div class="singel-form form-group">
                <label for="actualImage" style="font-weight: bold; font-size: 1.5em;">Actuelle Image:</label>
                <?php if (isset($_SESSION['image']) && !empty($_SESSION['image'])): ?>
                    <img src="../image/<?php echo $_SESSION['image']; ?>" class='w3-circle w3-margin-right' style='width:46px'>
                <?php else: ?>
                    <p>Aucune image actuelle n'est disponible.</p>
                <?php endif; ?>


                <br>
                <label for="newImage" style="font-weight: bold; font-size: 1.5em;"> Nouvelle Image : </label>
                <center><input type="file" name="newImage" id="newImage" accept="image/*"
                        style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                    <br><span id="error_newImage" style="color: red; font-size: 0.75em;"></span>
                </center>
                <br>
                <center><input type="submit" value="Changer Mon Image" id="submitButtonImage" class="main-btn">
                </center>

            </div>
        </div>
    </form>
</div>
<br>




<div class="main-form pt-45">
    <form id="passwordForm" action="http://localhost/gestion_users/Back/controller/UpdateAdmin.php" method="post"
        style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

        <center>
            <h3>Votre Mot de passe</h3>
        </center>
        <br>
        <div class="col-md-6">
            <div class="singel-form form-group">
                <label for="oldPassword" style="font-weight: bold; font-size: 1.5em;">Ancien Password :</label>
                <input type="password" name="oldPassword" id="oldPassword" placeholder="Ancien Password"
                    style="height: 3.25rem; width: 33vw; border-radius: 5px;"
                    value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>" readonly>
                <br>
                <label for="newPassword" style="font-weight: bold; font-size: 1.5em;"> Nouveau Password : </label>
                <center><input type="password" name="newPassword" id="newPassword" placeholder="Nouveau Password"
                        style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                    <br><span id="error_newPassword" style="color: red; font-size: 0.75em;"></span>
                </center>
                <br>
                <label for="confirmPassword" style="font-weight: bold; font-size: 1.5em;"> Confirmer Password : </label>
                <center><input type="password" name="confirmPassword" id="confirmPassword"
                        placeholder="Confirmer Password" style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                    <br><span id="error_confirmPassword" style="color: red; font-size: 0.75em;"></span>
                </center>
                <br>
                <center><input type="submit" value="Change mon Password" id="submitButtonPassword" class="main-btn">
                </center>

            </div>
        </div>

    </form>
</div>
<br>



<div style="margin-left: 20vw;">
    <a href="http://localhost/gestion_users/Back/controller/DeleteAdmin.php"><input type="button" class="main-btn"
            name="delateAccount" value="Delete My Account"></a>
</div>
<br>
<br>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>






<script>
    var changeUserName = document.getElementById('submitButtonUserName');
    var changeEmail = document.getElementById('submitButtonEmail');
    var changeImage = document.getElementById('submitButtonImage');
    var changePassword = document.getElementById('submitButtonPassword');
    var emailRegex =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var newUserName = document.getElementById('newUsername');
    var newEmail = document.getElementById('newEmail');
    var newImage = document.getElementById('newImage');
    var oldpassword = document.getElementById('oldPassword');
    var newPassword = document.getElementById('newPassword');
    var newPasswordConfirm = document.getElementById('confirmPassword');
    var error_newUserName = document.getElementById('error_newUserName');
    var error_newEmail = document.getElementById('error_newEmail');
    var error_newImage = document.getElementById('error_newImage');
    var error_newPassword = document.getElementById('error_newPassword');
    var error_confirmPassword = document.getElementById('error_confirmPassword');
    var error_oldPassword = document.getElementById('error_oldPassword');

    changeUserName.addEventListener('click', (event) => {

        if (newUserName.value.length == 0 || !/^[a-zA-Z]+$/.test(newUserName.value))
            error_newUserName.innerHTML = "Enter a new UserName";
        else
            error_newUserName.innerHTML = "";

        if (error_newUserName.innerHTML != "")
            event.preventDefault();
    });

    // Fonction pour valider un e-mail avec une expression régulière
    function validateEmail(email) {
        // Expression régulière pour valider un e-mail
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    // validation de l'email
    var userEmail = "test@example.com"; // Remplace avec la valeur de ton champ email
    if (!validateEmail(userEmail) && userEmail.length > 0) {
        errorMessageEmail.innerHTML = 'Enter a valid email address';
    } else {
        errorMessageEmail.innerHTML = "";
    }

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
    // Fonction pour mettre à jour l'ancien username avec le nouveau username
    function updateOldUsername() {
        var newUsername = document.getElementById('newUsername').value;
        document.getElementById('actualUsernameInput').value = newUsername;
    }
    // Ajoutez un écouteur d'événements sur le bouton de soumission du formulaire
    document.getElementById('submitButtonUserName').addEventListener('click', function (event) {
        updateOldUsername(); // Appeler la fonction pour mettre à jour l'ancien username avec le nouveau username
    });
    // Fonction pour mettre à jour l'ancien email avec le nouveau email
    function updateOldEmail() {
        var newEmail = document.getElementById('newEmail').value;
        document.getElementById('actualEmailInput').value = newEmail;
    }
    document.getElementById('submitButtonEmail').addEventListener('click', function (event) {
        updateOldEmail();
    });
    // Fonction pour afficher l'image téléchargée
    function previewImage() {
        var fileInput = document.getElementById('newImage');
        var imagePreview = document.getElementById('actualImagePreview');
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    // Ajouter un écouteur d'événements sur le changement du fichier image
    document.getElementById('newImage').addEventListener('change', function (event) {
        previewImage(); // Appeler la fonction pour afficher l'image téléchargée
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