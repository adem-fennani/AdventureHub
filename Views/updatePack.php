<?php

include '../Controller/PackC.php';

$error = "";

// create employe
$pack = null;

// create an instance of the controller
$packC = new PackC();
if (
    isset($_POST["id"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date_dep"]) &&
    isset($_POST["date_arri"]) &&
    isset($_POST["hotel_name"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['description']) &&
        !empty($_POST["date_dep"]) &&
        !empty($_POST["date_arri"]) &&
        !empty($_POST["hotel_name"])
    ) {
        $pack = new Pack(
            $_POST['id'],
            $_POST['description'],
            new DateTime($_POST['date_dep']),
            new DateTime($_POST['date_arri']),
            ($_POST['hotel_name']),
        );
        $packC->updatePack($pack, $_POST["id"]);
        header('Location:ListPack.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pack</title>
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
        <h1>Update Pack</h1>

        <form action="" id="form" method="POST">
            <?php
            if (isset($_POST['id'])) {
                $pack = $packC->showPack($_POST['id']);
            ?>

                <input type="hidden" name="id" value="<?php echo $pack['id']; ?>">

                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?php echo $pack['description']; ?>">
                <span class="error" id="error_description"></span>

                <label for="date_dep">Date de départ:</label>
                <input type="date" name="date_dep" id="date_dep" value="<?php echo date('Y-m-d', strtotime($pack['date_dep'])); ?>">
                <span class="error" id="error_date_dep"></span>

                <label for="date_arri">Date d'arrivée:</label>
                <input type="date" name="date_arri" id="date_arri" value="<?php echo date('Y-m-d', strtotime($pack['date_arri'])); ?>">
                <span class="error" id="error_date_arri"></span>

                <label for="hotel_name">Hotel Name:</label>
                <input type="text" name="hotel_name" id="hotel_name" value="<?php echo $pack['hotel_name']; ?>">
                <span class="error" id="error_hotel_name"></span>

                <input type="submit" value="Update">
                <input type="reset" value="Reset">
            <?php
            }
            ?>
        </form>
    </div>

    <script>
        const form = document.getElementById("form");
        const description = document.getElementById("description");
        const date_dep = document.getElementById("date_dep");
        const date_arri = document.getElementById("date_arri");
        const hotel_name = document.getElementById("hotel_name");
        console.log("found everything");



        form.addEventListener("submit", function(event) {
                console.log("enter form input control");
                event.preventDefault();
                checkdescription();
                checkdate_dep();
                checkdate_arri();
                checkhotel_name();
                //checkPassword()*/
                console.log("the actual value is ");

                console.log(document.getElementById("error_description").innerHTML);

                if (
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





        function checkhotel_name() {
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
    </script>
</body>

</html>
