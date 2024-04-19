const form = document.getElementById("form");
const nomInput = document.getElementById("nom");
const hostInput = document.getElementById("host");
const telephoneInput = document.getElementById("telephone");
const dateOfBirthInput = document.getElementById("date_naissance");

form.addEventListener("submit", function (event) {
    event.preventDefault();
    validerId();
    validerNom();
    validerHost();
    validerDescription();
    validerLocation();
    validerDate();
    validerStatus();
    
  });

  function validerId() {
    const idValeur = idInput.value;
    const idRegex = /^\d{8}$/;
    const erreurId = document.getElementById("erreurId");
  
    if (!idValeur.match(idRegex)) {
      erreurId.innerHTML = "Veuillez entrer un Id valide (8 entier uniquement)";
    } else {
      erreurId.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }





  function validerNom() {
    const nomValeur = nomInput.value.trim();
    const nomRegex = /^[A-Za-z]+$/;
    const erreurNom = document.getElementById("erreurNom");
  
    if (!nomValeur.match(nomRegex)) {
      erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
    } else if (nomValeur.length > 25) {
      erreurNom.innerHTML = "Le nom ne doit pas dépasser 25 caractères.";
    } else {
      erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }

  function validerHost() {
    const hostValeur = hostInput.value.trim();
    const hostRegex = /^[A-Za-z]+$/;
    const erreurHost = document.getElementById("erreurHost");
  
    if (!hostValeur.match(hostRegex)) {
      erreurHost.innerHTML = "Veuillez entrer un hôte valide (lettres uniquement)";
    } else if (hostValeur.length > 25) {
      erreurHost.innerHTML = "L'hôte ne doit pas dépasser 25 caractères.";
    } else {
      erreurHost.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  function validerDescription() {
    const descriptionValeur = descriptionInput.value.trim();
    const maxTaille = 1000; 
    const erreurDescription = document.getElementById("erreurDescription");
  
    if (descriptionValeur.length > maxTaille) {
      erreurDescription.innerHTML = "La description ne doit pas dépasser " + maxTaille + " caractères.";
    } else {
      erreurDescription.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  function validerStatus() {
    const statusValeur = statusInput.value.trim();
    const statusRegex = /^[A-Za-z]+$/;
    const erreurStatus = document.getElementById("erreurStatus");
  
    if (!statusValeur.match(statusRegex)) {
      erreurStatus.innerHTML = "Veuillez entrer un statut valide (lettres uniquement)";
    } else if (statusValeur.length > 25) {
      erreurStatus.innerHTML = "Le statut ne doit pas dépasser 25 caractères.";
    } else {
      erreurStatus.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  
  function validerLocation() {
    const locationValeur = locationInput.value.trim();
    const locationRegex = /^[A-Za-z]+$/;
    const erreurLocation = document.getElementById("erreurLocation");
  
    if (!locationValeur.match(locationRegex)) {
      erreurLocation.innerHTML = "Veuillez entrer une location valide (lettres uniquement)";
    } else if (locationValeur.length > 25) {
      erreurLocation.innerHTML = "La location ne doit pas dépasser 25 caractères.";
    } else {
      erreurLocation.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  