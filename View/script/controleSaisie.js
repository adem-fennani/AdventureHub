document.addEventListener("DOMContentLoaded", function () {
  // Function to validate the form on submit
  function validateForm(event) {
    event.preventDefault(); // Prevent default form submission

    // Get form fields
    var adresseLivraison = document.getElementById("adresse_livraison");
    var prixTotal = document.getElementById("prix_total");
    var dateCommande = document.getElementById("dateCommande");

    // Validation for adresse_livraison field
    if (
      !/^[A-Za-zÀ-ÖØ-öø-ÿ]+$/.test(adresseLivraison.value) ||
      adresseLivraison.value.length < 1
    ) {
      displayError(
        adresseLivraison,
        " L'adresse doit contenir que des lettres et non vide."
      );
      return false; // Mark validation as failed
    } else {
      displaySuccess(adresseLivraison);
    }

    // Validation for prix_total field
    if (!/^\d+(?:\.\d{3})?$/.test(prixTotal.value) || prixTotal.value <= 0) {
      displayError(
        prixTotal,
        "Le prix total doit être un nombre positif."
      );
      return false; // Mark validation as failed
    } else {
      displaySuccess(prixTotal);
    }

    // Validation for dateCommande field
    var dateCommandeValue = new Date(dateCommande.value);
    var currentDate = new Date();
    if (
      dateCommandeValue.toString() === "Invalid Date" ||
      dateCommandeValue <= currentDate
    ) {
      displayError(
        dateCommande,
        " La date de naissance doit être supérieure à la date d'aujourd'hui."
      );
      return false; // Mark validation as failed
    } else {
      displaySuccess(dateCommande);
    }

    // If all validations passed, submit the form programmatically
    if (true) {
      // Assuming all validations successful (remove if needed)
      form.submit();
    }
  }

  // Function to display error message for a field
  function displayError(element, message) {
    element.classList.remove("success");
    element.classList.add("error");
    element.nextElementSibling.textContent = message;
    element.nextElementSibling.style.color = "red";
  }

  // Function to display success message for a field
  function displaySuccess(element) {
    element.classList.remove("error");
    element.classList.add("success");
    element.nextElementSibling.textContent = " Validation réussie!";
    element.nextElementSibling.style.color = "green";
  }

  // Add event listener to the form's submit event
  var form = document.querySelector("form");
  form.addEventListener("submit", validateForm);
});
