<?php

include '../Controller/PostController.php';
include '../Model/Comment.php';






class CommentC {
    //read post
    public function readComment() {
        $sql = "SELECT * FROM comments";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

  
    

    





    //delete post
    function deleteComment($id)
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function addComment($comment)
    {
        $sql = "INSERT INTO comments 
        VALUES (NULL, :p_id ,:u_id, :c,:c_at)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'p_id' => $comment->getPost_id(),
                'u_id' => $comment->getUser_id(),
                'c' => $comment->getComment(),
                'c_at' => $comment->getCreated_at()->format('Y-m-d H:i:s') // Updated date format
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateComment($comment, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE comments SET 
                    post_id = :post_id, 
                    user_id = :user_id, 
                    comment = :comment,  
                    created_at = :created_at
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'post_id' => $comment->getPost_id(),
                'user_id' => $comment->getUser_id(),
                'comment' => $comment->getComment(),
                'created_at' => $comment->getCreated_at()->format('Y-m-d H:i:s') // Updated date format
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    function showOneComment($id)
    {
        $sql = "SELECT * from comments where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $post = $query->fetch();
            return $post;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


   /* 
    public function readCommentPerPost($post_id) {
        $sql = "SELECT * FROM comments WHERE post_id = :post_id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/

    
public function readCommentPerPost($post_id) {
    $sql = "SELECT * FROM comments WHERE post_id = ?";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute([$post_id]); // Pass $post_id as an argument here
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

}


$postC = new PostC();
$list = $postC->readPost();

$commentC = new CommentC();
$list_comment = $commentC->readComment();
?>




<!DOCTYPE html>
<html>

<head>
  <title>Back-office</title>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="icon" href="logo.png" type="image/png">
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
  </style>

</head>

<body class="w3-light-grey">
  <style>
    body {
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
    }
  </style>
  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right"><img src="logo white.png" alt="" width="40px"></span>
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
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
      <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Aperçu</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Vues</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Articles</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Actualités</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Historique</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Paramètres </a><br><br>
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

    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-quarter">
        <div class="w3-container w3-red w3-padding-16">
          <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>52</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>commentaires</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>99</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>vues</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
          <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>23</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>partage</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-orange w3-text-white w3-padding-16">
          <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>50</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Contributeur</h4>
        </div>
      </div>
    </div>

    <div class="w3-panel">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-third">
          <h5>Régions</h5>
          <img src="regions.png" style="width:100%" alt="Google Regional Map">
        </div>
        <div class="w3-twothird">
          <h5>Feeds</h5>
          <table class="w3-table w3-striped w3-white">
            <tr>
              <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
              <td>Nouveau record, plus de 90 vues !.</td>
              <td><i>10 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
              <td>Erreur de base de données. </td>
              <td><i>15 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
              <td>Nouveau record, plus de 40 Contributeur. .</td>
              <td><i>17 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
              <td>Nouveaux commentaires. /td>
              <td><i>25 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
              <td>Rapport de contrôle.</td>
              <td><i>28 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
              <td>Nouveau record, plus de 30 vues !.</td>
              <td><i>35 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
              <td>Nouvelles partages..</td>
              <td><i>39 mins</i></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <hr>




    <div class="w3-container">
      <h5>Liste des posts</h5>
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <tr>
          <th>Id </th>
          <th>user id</th>
          <th>content</th>
          <th>created_at</th>
          <th>location</th>
          <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $post) {
        ?>
          <tr>
            <td><?= $post['id']; ?></td>
            <td><?= $post['user_id']; ?></td>
            <td><?= $post['content']; ?></td>
            <td><img src=<?= $post['image']; ?> alt="" width="100px"></td>
            <td><?= $post['created_at']; ?></td>
            <td><?= $post['location']; ?></td>

            <td>
              <a href="dPc.php?id=<?php echo $post['id']; ?>" class="w3-button w3-dark-grey">Delete</a>
            </td>
          </tr>
        <?php
        }
        ?>

    </div>


    </table><br>
  </div>




  <div class="w3-container">
  <h5>Liste des posts</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
            <th>Id </th>
            <th>Post id</th>
            <th>User id</th>
            <th>image</th>
            <th>Comment</th>
            <th>created_at</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list_comment as $post) {
        ?>
            <tr>
                <td><?= $post['id']; ?></td>
                <td><?= $post['post_id']; ?></td>
                <td><?= $post['user_id']; ?></td>
                <td><?= $post['comment']; ?></td>
                <td><?= $post['created_at']; ?></td>
                
                <td>
                    <a href="dCc.php?id=<?php echo $post['id']; ?>"   class="w3-button w3-dark-grey">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        
  </div>

    </table><br>
  </div>
















  <hr>
  <div class="w3-container">
    <h5> Contributeurs récents </h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="mike.jpg" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="jill.jpg" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="jane.jpg" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
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