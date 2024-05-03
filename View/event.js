
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById("form");

  const nomInput = document.getElementById("nom");
  const hostInput = document.getElementById("host");

  if (form) {
      form.addEventListener("submit", function (event) {
          
          
          // Valider chaque champ et stocker le résultat dans des variables
          const nomValide = validerNom();
          const hostValide = validerHost();

          
          // Vérifier si toutes les validations ont réussi
          if (nomValide && hostValide  ) {
             rediriger();
           
          } else {
              // Afficher le message d'erreur indiquant que le formulaire n'est pas valide
              document.getElementById('messageErreur').innerHTML = "Veuillez corriger les erreurs dans le formulaire.";
              event.preventDefault();
          }
      });
  }
function validerNom() {
  const nomValeur = document.getElementById('nom').value.trim();
  const nomRegex = /^[a-zA-Z\s]+$/;

  if (!nomValeur.match(nomRegex)) {
      document.getElementById('erreurNom').innerHTML = "Veuillez entrer un nom valide (lettres et espaces uniquement)";
      console.log("Erreur de validation du nom"); // Ajouter une instruction console.log() pour indiquer une erreur de validation
      return false;
  } else {
      document.getElementById('erreurNom').innerHTML = "";
      console.log("Validation du nom réussie"); // Ajouter une instruction console.log() pour indiquer une validation réussie
      return true;
  }
}


function validerHost() {
  const hostValeur = document.getElementById('host').value.trim();
  const hostRegex = /^[a-zA-Z\s]+$/;

  if (!hostValeur.match(hostRegex)) {
      document.getElementById('erreurHost').innerHTML = "Veuillez entrer un host valide (lettres et espaces uniquement)";
      console.log("Erreur de validation du Host"); // Ajouter une instruction console.log() pour indiquer une erreur de validation
      return false;
  } else {
    
      document.getElementById('erreurHost').innerHTML = "";
      console.log("Validation du host réussie"); // Ajouter une instruction console.log() pour indiquer une validation réussie
      return true;
  }
}

// Fonction pour rediriger vers la liste 
function rediriger() {
  window.location.href = "addEvent.php"; // Mettre l'URL correcte si nécessaire
}
});




 