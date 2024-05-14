

const form = document.getElementById("form");
const id_reclamation = document.getElementById("id_reclamation");
const description = document.getElementById("description");
const date_dep = document.getElementById("date_dep");
const date_arri = document.getElementById("date_arri");
const hotel_name = document.getElementById("hotel_name");
console.log("found everything");



form.addEventListener("submit", function (event) {
  console.log("enter form input control");
  event.preventDefault();
  checkid_reclamation();
  checkdescription();
  checkdate_dep();
  checkdate_arri();
  checkhotel_name();
  //checkPassword()*/
  console.log ( "the actual value is ");

  console.log ( document.getElementById("error_description").innerHTML);
  if (
    document.getElementById("error_id_reclamation").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_description").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_date_dep").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_date_arri").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error_hotel_name").innerHTML === "<span style=\"color:green\"> Correct </span>"
  ) {
    // Submit the form if all inputs are correct
    form.submit();
  }
}




);

function checkid_reclamation() {
  console.log("enter id_reclamation");

  const error_id_reclamation = document.getElementById("error_id_reclamation");

  // Basic check for non-numeric values (assuming non-numeric values would be NaN)
  if (isNaN(id_reclamation)) {
    error_id_reclamation.innerHTML = "Enter a valid ID (numbers only)";
  } else {
    error_id_reclamation.innerHTML = "<span style='color:green'> Correct </span>";
  }
}




function checkdescription() {
  console.log("enter description");
  const uid = description.value;
  const possible_id = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error_description = document.getElementById("error_description");

  if (!uid.match(possible_id)) {
    error_description.innerHTML =
      "enter valid description";
  } else {
    error_description.innerHTML = "<span style='color:green'> Correct </span>";
  }
}


function checkdate_dep() {
    console.log("enter date_dep_input ");
  
    // Retrieve the value of the input field with id "date_dep"
    const date_dep_input = document.getElementById("date_dep").value;
  
    // Regular expression to match a date format (YYYY-MM-DD)
    const possible_date_dep = /^\d{4}-\d{2}-\d{2}$/;
    const error_date_dep = document.getElementById("error_date_dep");
  
    if (!date_dep_input.match(possible_date_dep)) {
      error_date_dep.innerHTML = "Enter a valid date format (YYYY-MM-DD)";
    } else {
      error_date_dep.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  


  function checkdate_arri() {
    console.log("enter date_arri_input ");
  
    // Retrieve the values of the input fields for departure and arrival dates
    const date_dep_input = document.getElementById("date_dep").value;
    const date_arri_input = document.getElementById("date_arri").value;
  
    // Regular expression to match a date format (YYYY-MM-DD)
    const possible_date = /^\d{4}-\d{2}-\d{2}$/;
    const error_date_arri = document.getElementById("error_date_arri");
  
    // Check if both dates have valid formats
    if (!date_dep_input.match(possible_date) || !date_arri_input.match(possible_date)) {
      error_date_arri.innerHTML = "Enter valid date formats (YYYY-MM-DD)";
    } else {
      // Convert strings to Date objects for comparison
      const departureDate = new Date(date_dep_input);
      const arrivalDate = new Date(date_arri_input);
      
      // Check if arrival date is greater than or equal to departure date
      if (arrivalDate < departureDate) {
        error_date_arri.innerHTML = "Arrival date must be greater than or equal to departure date";
      } else {
        error_date_arri.innerHTML = "<span style='color:green'> Correct </span>";
      }
    }
}

  



function   checkhotel_name() {
  console.log("enter hotel_name_input ");

  const hotel_name_input = hotel_name.value;
  const possible_hotel_name = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error_hotel_name = document.getElementById("error_hotel_name");

  if (!hotel_name_input.match(possible_hotel_name)) {
    error_hotel_name.innerHTML = "enter a hotel_name";
  } else {
    error_hotel_name.innerHTML = "<span style='color:green'> Correct </span>";
  }
}




