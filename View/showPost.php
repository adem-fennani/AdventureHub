<?php
include '../Controller/PostController.php';
$postC = new PostC();
$list = $postC->readPost();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show post</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;

        }


        .feeds {
            width: 65%;
            border-radius: 20px;
            overflow: hidden;
            display: block;

        }

        .post {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;


        }

        .post-header {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .post-header span {
            margin-right: 10px;
        }

        .post-content {
            margin-top: 10px;
            text-align: center;
            /* Center the content horizontally */
        }

        .post-content p {
            margin-bottom: 10px;
        }

        .post-content img {
            width: 100%;
            height: auto;
            display: block;
            /* Make the image a block element */
            margin: 0 0;
            /* Center the image horizontally */
        }

        .post-location {
            font-style: italic;
        }
    </style>
    <link rel="icon" href="./logo white.png">

</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><img src="logo.png" alt="AdventureHub logo" width="40px"> Conseils & actualités</a>
            <!-- Float links to the right. Hide them on small screens -->

            <div class="w3-right w3-hide-small">
                <a href="#home" class="w3-bar-item w3-button">Acceuil</a>
                <a href="shop.html" class="w3-bar-item w3-button">Boutique</a>
                <a href="#Agency" class="w3-bar-item w3-button">Agences</a>
            </div>
        </div>
    </div>







    <center style="padding-top: 4rem;">
        <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">List of Post</h1>
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">
            <button class="w3-button w3-black w3-section" type="submit">

                <a href="addPost.php" class="fa fa-paper-plane" style="text-decoration: none;">Add Post</a>
            </button>
        </h2>
    </center>





    <div style=" align-items: center; justify-content:center; padding-left: 25%;">

        <div class="feeds">
            <?php foreach ($list as $post) : ?>
                <div class="post" style="overflow: hidden;">
                    <div class="post-header" style="background-color: black; color:#ccc; padding: 10px 50px; border-radius:15px ">
                        Post Id = <span class="post-id"><?= $post['id']; ?></span><br>
                        User Id = <span class="post-user"><?= $post['user_id']; ?></span><br>
                        create at = <span class="post-date"><?= $post['created_at']; ?></span><br>
                        <h2><?= $post['content']; ?></h2>

                    </div>
                    <div class="post-content">
                        <?php if (!empty($post['image'])) : ?>
                            <img src="<?= $post['image']; ?>" alt="Post Image" width="300px" style="border-radius: 15px;">
                        <?php endif; ?>
                        <?php if (!empty($post['location'])) : ?>
                            <p class="post-location"> location : <?= $post['location']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="" style="display:flex; height: 71px; gap: 20px ;">
                        <form method="POST" action="updatePost.php">
                            <input type="submit" name="update" value="Update" class="w3-button w3-black w3-section">
                            <input type="hidden" value=<?PHP echo $post['id']; ?> name="id">
                        </form>
                        <a href="deletePost.php?id=<?php echo $post['id']; ?>" class="w3-button w3-black w3-section">Delete</a>
                    </div>


                </div>
            <?php endforeach; ?>
        </div>





    </div>






</body>

</html>