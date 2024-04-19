<?php

include '../config.php';
include '../Model/Post.php';

class PostC {

    //read post

    public function readPost() {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    //delete post
    function deletePost($id)
    {
        $sql = "DELETE FROM post WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function addPost($post)
    {
        $sql = "INSERT INTO post  
        VALUES (NULL, :u_id ,:c, :im,:c_at,:loc)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'u_id' => $post->getUser_id(),
                'c' => $post->getContent(),
                'im' => $post->getImage(),
                'c_at' => $post->getCreated_at()->format('Y-m-d H:i:s'), // Updated date format
                'loc' => $post->getLocation()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatePost($post, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET 
                    user_id = :user_id, 
                    content = :content, 
                    image = :image,  
                    created_at = :created_at,
                    location = :location
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'user_id' => $post->getUser_id(),
                'content' => $post->getContent(),
                'image' => $post->getImage(),
                'created_at' => $post->getCreated_at()->format('Y-m-d H:i:s'), // Updated date format
                'location' => $post->getLocation()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    function showOnePost($id)
    {
        $sql = "SELECT * from post where id = $id";
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

}

?>
