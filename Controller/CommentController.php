<?php

include '../config.php';
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


    
    public function readCommentPerPost($post_id) {
        $sql = "SELECT * FROM comments WHERE post_id = :post_id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}




?>



