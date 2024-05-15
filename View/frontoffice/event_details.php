<?php
// Include necessary files and initialize variables if needed
include_once '../config.php';
include_once '../../Model/event.php';
include_once '../../Controller/EventC.php';

// Instantiate EventC class
$eventC = new EventC();

// Get article details by ID
$articleId = $_GET['id']; // Get article ID from URL
$article = $eventC->getEventById($articleId); // Assuming the method to get event details by ID is implemented in EventC

// Check if article exists
if ($article) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AdventureHub</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
        .details {
            background-color: black; /* Couleur de fond */
            border: 1px solid #ddd; /* Bordure */
            border-radius: 5px; /* Coins arrondis */
            padding: 20px; /* Espace intérieur */
        }

        .details h2 {
            text-align: center;
            color: white; /* Violet pour le titre */
            font-size: 24px;
            margin-bottom: 10px;
        }

        .details p {
            color: white; /* noir pour le texte */
            font-size: 16px;
            margin-bottom: 5px;
        }

        .details strong {
            color: #ff7f50; /* Orange pour les mots forts */
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center header-inner">
        <div class="container-fluid container-xxl d-flex align-items-center">
            <div class="w3-top">
                <div class="w3-bar w3-white w3-wide w3-padding w3-card">
                    <a href="#home" class="w3-bar-item w3-button"><img src="../../img/logo.png" alt="AdventureHub logo" width="40px"> EventHub</a>
                    <!-- Float links to the right. Hide them on small screens -->
                    <div class="w3-right w3-hide-small">
                        <a href="#home" class="w3-bar-item w3-button">Acceuil</a>
                        <a href="#shop" class="w3-bar-item w3-button">Boutique</a>
                        <a href="#Agency" class="w3-bar-item w3-button">Agences</a>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- End Header -->

    <main id="main" class="main-page">
        <!-- ======= Article Details Section ======= -->
        <section id="article-details">
            <div class="container">
                <div class="section-header">
                    <h2>Détails Du Feedback</h2>
                </div>
                <div class="row">
                    <div style="text-align: center;">
                        <!-- Assuming article image is stored in the database or available through $article['image'] -->
                        <img src="../../img/event.jpg" alt="" style="width:50%">
                    </div>
                    <div class="col-md-6">
                        <div class="details">
                            <h2><?= $article['nom']; ?></h2>
                            <p><strong>Nom:</strong> <?= $article['nom']; ?></p>
                            <p><strong>Host:</strong> <?= $article['host']; ?></p>
                            <p><strong>Description:</strong> <?= $article['description']; ?></p>
                            <p><strong>Location:</strong> <?= $article['location']; ?></p>
                            <p><strong>Date:</strong> <?= $article['date']; ?></p>
                            <p><strong>Status:</strong> <?= $article['status']; ?></p>
                            <!-- Additional details can be added here -->
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <script>
        // JavaScript function to add event ID to the URL and redirect to addFeedback.php
        function addfeed() {
            // Get the event ID from PHP variable
            var eventId = "<?php echo $articleId; ?>";
            // Redirect to addFeedback.php with the event ID in the URL
            window.location.href = "addFeedback.php?id=" + eventId;
        }
    
    </script>
          <div class="w3-container">
  <h5> liste des Feedbacks</h5>
  <div class="w3-container">
    <!--recherche-->
  <form id="searchForm" action="" method="GET">
    <label for="searchQuery">Rechercher :</label>
    <input type="text" name="searchQuery" id="searchQuery">
    <input  class="w3-button w3-dark-grey" type="submit" value="Rechercher">
  </form>
  </div>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
      <div class="w3-container">
    
    

  <?php
  @include '../../Controller/FeedbackC.php';

  // Créer une instance de la classe FeedbackC
  $feedbackC = new FeedbackC();

  // Vérifier si l'option de tri a été sélectionnée dans le formulaire
  if (isset($_GET['sortOption'])) {
    // Récupérer la valeur de l'option de tri depuis le formulaire
    $sortOption = $_GET['sortOption'];

    // Appeler la fonction pour récupérer les retours triés en fonction de l'option sélectionnée
    $list= $feedbackC->listFeedbacksSortedByOption($sortOption);
  } else {
    // Si aucune option de tri n'est sélectionnée, afficher les retours sans tri
    $list = $feedbackC->listFeedbacks();
  }
  ?>
    <html>
    
    <head></head>
    
    <body>
            <!--tri-->
            <form id="sortForm" action="" method="GET">
            <label for="sortOption">Trier par :</label>
            <select name="sortOption" id="sortOption">
            <option value="publicationDate_DESC">Date (plus récente d'abord)</option>
            <option value="publicationDate_ASC">Date (plus ancienne d'abord)</option>
            <!-- Ajoutez d'autres options de tri si nécessaire -->
            </select>
            <input type="submit" value="Appliquer">
            </form>
      

        <table  align="center" width="80%">
            
            <?php
            //affiche feed
            foreach ($list as $feedback) {
            ?>
            <tr>
                <tr>
                <th>Id user</th>
                <td><?= $feedback['idu']; ?></td>
               </tr>
                <tr>
                <th>content</th>
                <td><?= $feedback['contenu']; ?></td>
                </tr>
                <tr>
                <th>date de publication</th>
                <td><?= $feedback['publicationDate']; ?></td>
                <br>
                </tr>
            </tr> 
            <tr><td colspan="2"><hr></td></tr>    
            <?php
            }
            ?>
            <hr>
        </table>
        </body>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <!-- bouton ajouter feed -->
        <button type="button" onclick="addfeed()" style="
        
        position: fixed;
        bottom: 0px;
        width: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: black;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;">ajouter un feedback</button>
        <!-- end bouton ajouter -->
    </footer><!-- End  Footer -->


</html>

<?php
} else {
    // Handle case when article is not found
    echo "Article not found.";
}
?>
