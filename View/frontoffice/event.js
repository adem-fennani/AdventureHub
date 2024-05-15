function validateForm() {
  var nom = document.getElementById("nom").value;
  var host = document.getElementById("host").value;
  var description = document.getElementById("description").value;
  var location = document.getElementById("location").value;
  var date = document.getElementById("date").value;
  var status = document.getElementById("status").value;

  var isValid = true;

  // Reset error message boxes
  document.querySelectorAll(".error-message").forEach(function(msgBox) {
    msgBox.textContent = "";
  });

  // Validation rules
  if (nom.trim() === "") {
    document.getElementById("erreurNom").textContent = "Nom est obligatoire";
    isValid = false;
  }

  if (host.trim() === "") {
    document.getElementById("erreurHost").textContent = "Host est obligatoire";
    isValid = false;
  }

  if (description.trim() === "") {
    document.getElementById("erreurDescription").textContent = "Description est obligatoire";
    isValid = false;
  }

  if (location.trim() === "") {
    document.getElementById("erreurLocation").textContent = "Location est obligatoire";
    isValid = false;
  }

  if (date.trim() === "") {
    document.getElementById("erreurDate").textContent = "Date est obligatoire";
    isValid = false;
  }

  if (status.trim() === "") {
    document.getElementById("erreurStatus").textContent = "Status est obligatoire";
    isValid = false;
  }

  return isValid;
}
