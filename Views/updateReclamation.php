<?php

include '../Controller/ReclamationC.php';

$error = "";

// create employe
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["id"]) &&
    isset($_POST["id_user"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["Date_rec"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["id_user"]) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["Date_rec"])
    ) {
        $reclamation = new Reclamation(
            $_POST['id'],
            $_POST['id_user'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['contenu'],
            new DateTime($_POST['Date_rec'])
        );
        $reclamationC->updateReclamation($reclamation, $_POST["id"]);
        header('Location:ListReclamation.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 10px;
            margin: 10px 1% 0 0;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Complaint</h1>

        <form action="" id="form" method="POST">
            <?php
            if (isset($_POST['id'])) {
                $reclamation = $reclamationC->showReclamation($_POST['id']);
            ?>

                <input type="hidden" name="id" value="<?php echo $reclamation['id']; ?>">
                <label for="id_user">id_user:</label>
                <input type="number" name="id_user" id="id_user"value="<?php echo $reclamation['id_user']; ?>">
                <span class="error" id="error_id_user"></span>

                <label for="firstName">firstName:</label>
                <input type="text" name="firstName" id="firstName" value="<?php echo $reclamation['firstName']; ?>">
                <span class="error" id="error_firstName"></span>

                <label for="lastName">lastName:</label>
                <input type="text" name="lastName" id="lastName" value="<?php echo ($reclamation['lastName']); ?>">
                <span class="error" id="error_lastName"></span>

                <label for="contenu">Contenu:</label>
                <input type="text" name="contenu" id="contenu" value="<?php echo ($reclamation['contenu']); ?>">
                <span class="error" id="error_contenu"></span>

                <label for="Date_rec">Date reclamation:</label>
                <input type="date" name="Date_rec" id="Date_rec" value="<?php echo date('Y-m-d',strtotime( $reclamation['Date_rec'])); ?>">
                <span class="error" id="error_Date_rec"></span>

                <input type="submit" value="Update">
                <input type="reset" value="Reset">
            <?php
            }
            ?>
        </form>
    </div>

    <script>
        



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
  console.log("enter id_user");

  const error_id_user = document.getElementById("error_id_user");

  // Basic check for non-numeric values (assuming non-numeric values would be NaN)
  if (isNaN(id_user)) {
    error_id_user.innerHTML = "Enter a valid ID (numbers only)";
  } else {
    error_id_user.innerHTML = "<span style='color:green'> Correct </span>";
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





    </script>
</body>

</html>
