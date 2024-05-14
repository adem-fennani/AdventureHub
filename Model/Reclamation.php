<?php
class Reclamation
{
    private $id = null;
    private $id_user = null;
    private $firstName = null;
    private $lastName= null;
    private $contenu = null;
    private $Date_rec = null;

    public function __construct($id = null,$u, $n, $p, $em, $d)
    {
        $this->id = $id;
        $this->id_user=$u;
        $this->firstName = $n;
        $this->lastName = $p;
        $this->contenu = $em;
        $this->Date_rec = $d;
    }

    /**
     * Get the value of id
     */
    public function getid()
    {
        return $this->id;
    }
    /** Set id */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Get the value of id_user
     */
    public function getid_user()
    {
        return $this->id_user;
    }
    /** Set id */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }
    
    

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firsttName
     *
     * 
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of laststName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of laststName
     *
     * 
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of contenu
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * 
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate_rec()
    {
        return $this->Date_rec;
    }

    /**
     * Set the value of date
     *
     * 
     */
    public function setDate_rec($Date_rec)
    {
        $this->Date_rec = $Date_rec;

        return $this;
    }
}