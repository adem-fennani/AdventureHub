function alpha(ch) {
    ok = true;
    i = 0;
    ch = ch.toUpperCase();
    while (ok && i < ch.length) {
      if (ch.charAt(i) >= "A" && ch.charAt(i) <= "Z") {
        i++;
      } else {
        ok = false;
      }
    }
    return ok;
  }
  
  function chiffre(ch) {
    ok = true;
    i = 0;
    while (ok && i < ch.length) {
      if (ch.charAt(i) >= "0" && ch.charAt(i) <= "9") {
        i++;
      } else {
        ok = false;
      }
    }
    return ok;
  }
  
  function verif1() {
    alert("ssss");
    prix = document.getElementById("prix").value;
    titre = document.getElementById("titre").value;
    quantite = document.getElementById("quantite").value;
    description = document.getElementsByName("description");
    id = document.getElementById("id").value;
    image = document.getElementById("image").value;
  
    if (prix == "") {
      alert("Prix est Obligatoire");
      return false;
    }
    if (!chiffre(prix)) {
      alert("prix doit etre chiffre");
      return false;
    }
  
    if (titre == "") {
      alert("Titre est Obligatoire");
      return false;
    }
  
    if (!alpha(titre)) {
      alert("Titre est doit etre alphabetique");
      return false;
    }
    if (!chiffre(quantite)) {
      alert("quantite doit etre chiffre");
      return false;
    }
  
    if (description == "") {
      alert("Description est Obligatoire");
      return false;
    }
  
    if (!alpha(description)) {
      alert("Description est doit etre alphabetique");
      return false;
    }
  }
  