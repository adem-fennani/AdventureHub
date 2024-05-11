function validateForm() {
  var adresseLivraison = document
    .getElementById("adresse_livraison")
    .value.trim();
  var adresseLivraisonError = document.getElementById(
    "adresse_livraison_error"
  );

  if (adresseLivraison === "") {
    adresseLivraisonError.textContent =
      "Veuillez entrer une adresse de livraison!";
    return false; // Prevent form submission
  } else {
    adresseLivraisonError.textContent = ""; // Clear the error message if the input is not empty
    alert("Commande soumise avec succès!");
    return true; // Allow form submission
  }
}
