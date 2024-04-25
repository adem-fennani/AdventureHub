const adresseInput = document.getElementById("adresse_livraison");
const prixTotalInput = document.getElementById("prix_total");
const dateInput = document.getElementById("date");

form.addEventListener("submit", function (event) {
  event.preventDefault();
  validerAdresseLivraison();
  validerPrixTotal();
  validerDate();
});

function validerAdresseLivraison() {
  const adresseValue = adresseInput.value.trim();
  const adresseErrorElement = document.getElementById("adresseLivraisonError");

  if (!adresseValue) {
    adresseErrorElement.textContent = "Adresse de Livraison ne doit pas être vide.";
    return false;
  } else {
    adresseErrorElement.textContent = "";
    return true;
  }
}

function validerPrixTotal() {
  const prixTotalValue = prixTotalInput.value;
  const prixTotalErrorElement = document.getElementById("prixTotalError");

  if (
    !prixTotalValue ||
    isNaN(prixTotalValue) ||
    parseFloat(prixTotalValue) < 0
  ) {
    prixTotalErrorElement.textContent =
      "Prix total invalide. Le prix total ne doit pas être négatif";
    return false;
  } else {
    prixTotalErrorElement.textContent = "";
    return true;
  }
}

function validerDate() {
  const dateValue = dateInput.value;
  const dateErrorElement = document.getElementById("dateCommandeError");

  if (!dateValue) {
    dateErrorElement.textContent = "Date de Commande ne doit pas être vide.";
    return false;
  } else {
    const selectedDate = new Date(dateValue);
    const today = new Date();

    if (selectedDate < today) {
      dateErrorElement.textContent =
        "Date de Commande ne doit pas être inférieure à celle d'aujourd'hui.";
      return false;
    } else {
      dateErrorElement.textContent = "";
      return true;
    }
  }
}
