<?php
class Comment
{
    private $id = null;
    private $post_id = null;
    private $user_id = null;
    private $comment = null;
    private $created_at = null;

    //*constructor

    public function __construct($id = null, $p_id, $u_id, $c, $c_at)
    {
        $this->id = $id;
        $this->post_id = $p_id;
        $this->user_id = $u_id;
        $this->comment = $c;
        $this->created_at = $c_at;
    }

    //*getter 
    public function getId()
    {
        return $this->id;
    }
    public function getPost_id()
    {
        return $this->post_id;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getComment()
    {
        return $this->comment;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }




    //*setter 
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    public function setCreated_at($created_at)
    {
        $this->comment = $created_at;
    }


}
