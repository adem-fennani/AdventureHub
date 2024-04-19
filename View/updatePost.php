<?php
include '../Controller/PostController.php';

$error = "";

$post = null;

$postC = new PostC();
if (
    isset($_POST["id"]) &&
    isset($_POST["user_id"]) &&
    isset($_POST["content"]) &&
    isset($_POST["image"]) &&
    isset($_POST["created_at"]) &&
    isset($_POST["location"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['user_id']) &&
        !empty($_POST["content"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["created_at"]) &&
        !empty($_POST["location"])
    ) {
        $post = new Post(
            $_POST['id'],
            $_POST['user_id'],
            $_POST['content'],
            $_POST['image'],
            new DateTime($_POST['dob']),
            $_POST['location']
        );
        $postC->updatePost($post, $_POST["id"]);
        header('Location:showPost.php');
    } else
        $error = "Missing information";
}
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
            width: 50%;
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
        <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">Modify the post</h1>
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">
            <button class="w3-button w3-black w3-section" type="submit">

                <a href="showPost.php" class="fa fa-paper-plane" style="text-decoration: none;">Back to list</a>
            </button>
        </h2>
    </center>

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $post = $postC->showOnePost($_POST['id']);

    ?>

<form action="" method="POST">
    <table  align="center">
        <tr style="display: none;">
            <td>
                <label for="id">Id:</label>
            </td>
            <td><input type="text" name="id" id="id" value="<?php echo $post['id']; ?>" maxlength="20" readonly></td>
        </tr>
        <tr style="display: none;">
            <td>
                <label for="user_id">User ID:</label>
            </td>
            <td><input type="text" name="user_id" id="user_id" value="<?php echo $post['user_id']; ?>" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="content">Content:</label>
            </td>
            <td><textarea name="content" id="content" rows="5" cols="50"><?php echo $post['content']; ?></textarea></td>
        </tr>
        <tr>
            <td>
                <label for="image">Image:</label>
            </td>
            <td><input type="text" name="image" id="image" value="<?php echo $post['image']; ?>"></td>
        </tr>
        <tr style="display: none;">
            <td>
                <label for="created_at" >Created At:</label>
            </td>
            <td><input type="text" name="created_at" id="created_at" value="<?php echo $post['created_at']; ?>" readonly></td>
        </tr>
        <tr>
            <td>
                <label for="location">Location:</label>
            </td>
            <td><input type="text" name="location" id="location" value="<?php echo $post['location']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Update" class="w3-button w3-black w3-section">
            </td>
            <td>
                <input type="reset" value="Reset"  class="w3-button w3-black w3-section">
            </td>
        </tr>
    </table>
</form>

    <?php
    }
    ?>








</body>

</html>