<?php
class Pack
{
    private $id = null;
    private $id_reclamation = null;
    private $description = null;
    private $date_dep= null;
    private $date_arri = null;
    private $hotel_name = null;

    public function __construct($id = null,$r, $n, $p, $em, $d)
    {
        $this->id = $id;
        $this->id_reclamation=$r;
        $this->description = $n;
        $this->date_dep = $p;
        $this->date_arri = $em;
        $this->hotel_name = $d;
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
     * Get the value of id_reclamation
     */
    public function getid_reclamation()
    {
        return $this->id_reclamation;
    }
    /** Set id */
    public function setId_reclamation($id_reclamation)
    {
        $this->id_reclamation = $id_reclamation;
    }

    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of firsttName
     *
     * 
     */
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of laststName
     */
    public function getdate_dep()
    {
        return $this->date_dep;
    }

    /**
     * Set the value of laststName
     *
     * 
     */
    public function setdate_dep($date_dep)
    {
        $this->date_dep = $date_dep;

        return $this;
    }

    /**
     * Get the value of date_arri
     */
    public function getdate_arri()
    {
        return $this->date_arri;
    }

    /**
     * Set the value of date_arri
     *
     * 
     */
    public function setdate_arri($date_arri)
    {
        $this->date_arri = $date_arri;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function gethotel_name()
    {
        return $this->hotel_name;
    }

    /**
     * Set the value of date
     *
     * 
     */
    public function sethotel_name($hotel_name)
    {
        $this->hotel_name = $hotel_name;

        return $this;
    }
}