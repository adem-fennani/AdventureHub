<?php
require_once '../config.php';

class User{
    private $id;
    private $prenom;
    private $nom;
    private $username;
    private $email;
    private $dob;
    private $adresse;
    private $numero;
    private $image;
    private $password;
    /*private $confirmation_token;
    private $confirmation_at;
    private $reset_token;
    private $reset_at;
    private $remember_at;*/

    public function __construct($prenom, $nom, $username, $email, $dob, $adresse, $numero, $image, $password, $id=null) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->username = $username;
        $this->email = $email;
        $this->dob = $dob;
        $this->adresse = $adresse;
        $this->numero = $numero;
        $this->image = $image;
        $this->password = $password;
        /*$this->confirmation_token = $confirmation_token;
        $this->confirmation_at = $confirmation_at;
        $this->$reset_token = $$reset_token;
        $this->reset_at = $reset_at;
        $this->remember_at = $remember_at;*/
    }
    public function getId()
    {
    return $this->id;
    }
    public function setId($id)
    {
    $this->id = $id;
    return $this;
    }
    public function getPrenom()
{
return $this->prenom;
}
public function setPrenom($prenom)
{
$this->prenom = $prenom;
return $this;
}
public function getNom()
{
return $this->nom;
}
public function setNom($nom)
{
$this->nom = $nom;
return $this;
}
public function getUsername()
{
return $this->username;
}
public function setUsername($username)
{
$this->username = $username;
return $this;
}
public function getEmail()
{
return $this->email;
}
public function setEmail($email)
{
$this->email = $email;
return $this;
}
public function getDob()
{
return $this->dob;
}
public function setDob($dob)
{
$this->dob = $dob;
return $this;
}
public function getAdresse()
{
return $this->adresse;
}
public function setAdresse($adresse)
{
$this->adresse = $adresse;
return $this;
}
public function getNumero()
{
return $this->numero;
}
public function setNumero($numero)
{
$this->numero = $numero;
return $this;
}
public function getImage()
{
return $this->image;
}
public function setImage($image)
{
$this->image = $image;
return $this;
}
public function getPassword()
{
return $this->password;
}
public function setPassword($password)
{
$this->password = $password;
return $this;
}
/*public function getConfirmation_token()
{
return $this->confirmation_token;
}
public function setConfirmation_token($confirmation_token)
{
$this->confirmation_token = $confirmation_token;
return $this;
}
public function getConfirmation_at()
{
return $this->confirmation_at;
}
public function setConfirmation_at($confirmation_at)
{
$this->confirmation_at = $confirmation_at;
return $this;
}
public function getReset_token()
{
return $this->reset_token;
}
public function setReset_token($reset_token)
{
$this->Reset_token = $reset_token;
return $this;
}
public function getReset_at()
{
return $this->reset_token;
}
public function setReset_at($reset_at)
{
$this->reset_at = $reset_at;
return $this;
}
public function getRemember_at()
{
return $this->remember_at;
}
public function setRemember_at($remember_at)
{
$this->remember_at = $remember_at;
return $this;
}*/
}


class Agence{
    private $id;
    private $username;
    private $email;
    private $adresse;
    private $numero;
    private $image;
    private $password;

    public function __construct($username, $email, $adresse, $numero, $image, $password, $id=null) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->numero = $numero;
        $this->image = $image;
        $this->password = $password;
    }
    public function getId()
    {
    return $this->id;
    }
    public function setId($id)
    {
    $this->id = $id;
    return $this;
    }
    public function getUsername()
{
return $this->username;
}
public function setUsername($username)
{
$this->username = $username;
return $this;
}
public function getEmail()
{
return $this->email;
}
public function setEmail($email)
{
$this->email = $email;
return $this;
}
public function getAdresse()
{
return $this->adresse;
}
public function setAdresse($adresse)
{
$this->adresse = $adresse;
return $this;
}
public function getNumero()
{
return $this->numero;
}
public function setNumero($numero)
{
$this->numero = $numero;
return $this;
}
public function getImage()
{
return $this->image;
}
public function setImage($image)
{
$this->image = $image;
return $this;
}
public function getPassword()
{
return $this->password;
}
public function setPassword($password)
{
$this->password = $password;
return $this;
}
}


class notification{
    private $number;

    private $userId;
    private $type;

    private $message;
    private $dateReceived;
    private $status;

    public function __construct($type,$userId, $message, $dateReceived, $status, $number=null) {
        $this->number = $number;
        $this->type = $type;
        $this->message = $message;
        $this->dateReceived = $dateReceived;
        $this->status = $status;
        $this->userId=$userId;
    }
    public function getNumber()
    {
    return $this->number;
    }

    public function getUserId()
    {
    return $this->userId;
    }
    public function setNumber($number)
    {
    $this->number = $number;
    return $this;
    }

    public function setUserId($userId)
    {
    $this->$userId = $userId;
    return $this;
    }
    public function getType()
{
return $this->type;
}
public function setType($type)
{
$this->type = $type;
return $this;
}
public function getMessage()
{
return $this->message;
}
public function setMessage($message)
{
$this->message = $message;
return $this;
}
public function getDateReceived()
{
return $this->dateReceived;
}
public function setDateReceived($dateReceived)
{
$this->dateReceived = $dateReceived;
return $this;
}
public function getStatus()
{
return $this->status;
}
public function setStatus($status)
{
$this->status = $status;
return $this;
}
}
class Onligne{
    private $id;
    private $time;

    public function __construct($time, $id=null) {
        $this->id = $id;
        $this->time = $time;
    }
    public function getId()
    {
    return $this->id;
    }
    public function setId($id)
    {
    $this->id = $id;
    return $this;
    }
    public function getTime()
{
return $this->time;
}
public function setTime($time)
{
$this->time = $time;
return $this;
}
}
?>