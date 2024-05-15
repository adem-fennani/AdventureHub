<!DOCTYPE html>
<html>

<head>
    <title>AdventureHub</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }

        .circular-progress {
            position: relative;
            width: 120px;
            height: 120px;
            margin: auto;
        }

        .circle {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .status {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .progress {
            position: absolute;
            width: 100%;
            height: 100%;
            clip: rect(0, 100px, 100px, 50px);
            background: conic-gradient(
                red,
                yellow,
                green,
                blue,
                violet,
                red
            );
            transform: rotate(var(--percentage, 0deg));
            border-radius: 50%;
        }

        .count {
            position: absolute;
            font-size: 24px;
            font-weight: bold;
        }
    </style>

</head>

<body class="w3-light-grey">
    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
        <span class="w3-bar-item w3-right"><img src="img/logo white.png" alt="" width="40px"></span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Bienvenue, <strong>Admin</strong></span><br>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> Aperçu</a>
           
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
        </header>

        

        <div class="w3-panel">
            
        </div>
        <hr>
        <hr>
        <div class="w3-container">
            <h5> liste des événemets</h5>
            <ul class="w3-ul w3-card-4 w3-white">
                <li class="w3-padding-16">
                    <div class="w3-container">
                        <!-- PHP code for event list -->
                        <?php
                        include '../../Controller/EventC.php';
                        $eventC = new EventC();
                        $list = $eventC->listEvents();
                        ?>

                        <!-- PHP code for event list table -->
                        <left>
                            <h5>
                                <a href="../frontoffice/addEvent.php">Add Event</a>
                            </h5>
                        </left>
                        <table align="center" width="80%">
                            <tr>
                                <th>Id Event</th>
                                <th>Nom</th>
                                <th>Host</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>date</th>
                                <th>status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            foreach ($list as $event) {
                            ?>
                                <tr>
                                    <td><?= $event['ide']; ?></td>
                                    <td><?= $event['nom']; ?></td>
                                    <td><?= $event['host']; ?></td>
                                    <td><?= $event['description']; ?></td>
                                    <td><?= $event['location']; ?></td>
                                    <td><?= $event['date']; ?></td>
                                    <td><?= $event['status']; ?></td>
                                    <td align="center">
                                        <form method="POST" action="../frontoffice/updateEvent.php">
                                            <input type="submit" name="update" value="Update">
                                            <input type="hidden" value=<?PHP echo $event['ide']; ?> name="ide">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="deleteEvent.php?ide=<?php echo $event['ide']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    
                </li>
            </ul>
        </div>
        <hr>

        <br>

        <!-- Footer -->
        <footer class="w3-container w3-padding-16 w3-light-grey">
            <h4>AdventureHub</h4>
        </footer>

        <!-- End page content -->
    </div>

    <script>
        // Fetch events data from the PHP script
        let eventList = <?php echo json_encode($list); ?>;

        // Extract status counts from the event list
        let statusCounts = {};
        eventList.forEach(event => {
            let status = event.status;
            statusCounts[status] = (statusCounts[status] || 0) + 1;
        });

        // Extract status labels and counts
        let statusLabels = Object.keys(statusCounts);
        let statusData = Object.values(statusCounts);

        // Create a chart.js instance
        let ctx = document.getElementById('eventChart').getContext('2d');
        let eventChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Nombre d\'événements par statut',
                    data: statusData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Function to get status color based on status name
        function getStatusColor(status) {
            switch (status) {
                case 'Open':
                    return 'green';
                case 'Closed':
                    return 'red';
                case 'Pending':
                    return 'yellow';
                default:
                    return 'grey';
            }
        }
    </script>

    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>

</body>

</html>
