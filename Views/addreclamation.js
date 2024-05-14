

const form = document.getElementById("form");
const id_user = document.getElementById("id_user");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const contenu = document.getElementById("contenu");
const Date_rec = document.getElementById("Date_rec");
console.log("found everything");



form.addEventListener("submit", function (event) {
  console.log("enter form input control");
  event.preventDefault();
  checkid_user();
  checkfirstName();
  checklastName();
  checkcontenu();
  checkDate_rec();
  //checkPassword()*/
  console.log ( "the actual value is ");

  console.log ( document.getElementById("error_firstName").innerHTML);

  if (
    document.getElementById("error_id_user").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_firstName").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_lastName").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_contenu").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_Date_rec").innerHTML === "<span style=\"color:green\"> Correct </span>"
  ) {
    // Submit the form if all inputs are correct
    form.submit();
  }
}




);


function checkid_user() {

  const iu = id_user.value;
  const numericPattern = /^[0-9]+$/;
  const errorIdUser = document.getElementById("error_id_user");

  if (!iu.match(numericPattern)) {
    errorIdUser.innerHTML = "Enter a valid ID (numbers only)";
  } else {
    errorIdUser.innerHTML = "<span style='color:green'> Correct </span>";
  }
}



function checkfirstName() {
  console.log("enter firstName");
  const uid = firstName.value;
  const possible_id = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error_firstName = document.getElementById("error_firstName");

  if (!uid.match(possible_id)) {
    error_firstName.innerHTML =
      "enter valid firstName";
  } else {
    error_firstName.innerHTML = "<span style='color:green'> Correct </span>";
  }
}


function checklastName() {
    console.log("enter lastName_input ");

  const lastName_input = lastName.value;
  const possible_lastName = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error_lastName = document.getElementById("error_lastName");

  if (!lastName_input.match(possible_lastName)) {
    error_lastName.innerHTML = "enter a lastName";
  } else {
    error_lastName.innerHTML = "<span style='color:green'> Correct </span>";
  }
  }
  


  function checkcontenu() {
    console.log("enter contenu_input ");

  const contenu_input = contenu.value;
  const possible_contenu = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error_contenu = document.getElementById("error_contenu");

  if (!contenu_input.match(possible_contenu)) {
    error_contenu.innerHTML = "enter a contenu";
  } else {
    error_contenu.innerHTML = "<span style='color:green'> Correct </span>";
  }
    }


  



function   checkDate_rec() {
    console.log("enter Date_rec_input ");
  
    // Retrieve the value of the input field with id "lastName"
    const Date_rec_input = document.getElementById("Date_rec").value;
  
    // Regular expression to match a date format (YYYY-MM-DD)
    const possible_Date_rec = /^\d{4}-\d{2}-\d{2}$/;
    const error_Date_rec = document.getElementById("error_Date_rec");
  
    if (!Date_rec_input.match(possible_Date_rec)) {
      error_Date_rec.innerHTML = "Enter a valid date format (YYYY-MM-DD)";
    } else {
      error_Date_rec.innerHTML = "<span style='color:green'> Correct </span>";
    }
}




