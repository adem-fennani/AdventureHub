function validateAdditionalFields() {
    var idu = document.getElementById("idu").value;
    var contenu = document.getElementById("contenu").value;
    var publicationDate = document.getElementById("publicationDate").value;
  
    var isValid = true;
  
    // Reset error message boxes
    document.querySelectorAll(".error-message-additional").forEach(function(msgBox) {
      msgBox.textContent = "";
    });
  
    // Validation rules
    if (idu.trim() === "") {
      document.getElementById("erreurIdu").textContent = "ID utilisateur est obligatoire";
      isValid = false;
    }
  
    if (contenu.trim() === "") {
      document.getElementById("erreurContenu").textContent = "Contenu est obligatoire";
      isValid = false;
    }
  
    if (publicationDate.trim() === "") {
      document.getElementById("erreurPublicationDate").textContent = "Date de publication est obligatoire";
      isValid = false;
    }
  
    return isValid;
  }
  