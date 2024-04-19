<?php
class Post
{
    private $id = null;
    private $user_id = null;
    private $content = null;
    private $image = null;
    private $created_at = null;
    private $location = null;

    //*constructor

    public function __construct($id = null, $u_id, $c, $im, $c_at, $loc)
    {
        $this->id = $id;
        $this->user_id = $u_id;
        $this->content = $c;
        $this->image = $im;
        $this->created_at = $c_at;
        $this->location = $loc;
    }

    //*getter 
    public function getId()
    {
        return $this->id;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function getLocation()
    {
        return $this->location;
    }




    //*setter 
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setCreated_at($created_at)
    {
        $this->image = $created_at;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }
}
