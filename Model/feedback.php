<?php
class Feedback
{
    private ?int $id = null;
    private ?int $ide = null;
    private ?int $idu= null;
    private ?string $contenu= null; 
    private ?DateTime $publicationDate = null;


    public function __construct($id = null, $ide, $idu, $contenu, $publicationDate)
    {
        $this->id = $id;
        $this->ide = $ide;
        $this->idu = $idu;
        $this->contenu = $contenu;
        $this->publicationDate = $publicationDate;
    }

    /**
     * Get the value of id
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Get the value of ide
     */
    public function getIde()
    {
        return $this->ide;
    }

    /**
     * Set the value of ide
     *
     * @return  self
     */
    public function setIde($ide)
    {
        $this->ide = $ide;

        return $this;
    }

        /**
     * Get the value of idu
     */
    public function getIdu()
    {
        return $this->idu;
    }
    /**
     * Set the value of idu
     *
     * @return  self
     */
    public function setIdu($idu)
    {
        $this->idu = $idu;

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
     * @return  self
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }


    /**
     * Get the value of date
     */
    public function getpublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function set($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }
    
}
