<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Topic extends Entity{

    private  $id;
    private  $titre;
    private $user;
    private $category;
    private  $dateTopic;
    private  $locked;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitre(){
        return $this->titre;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitre($titre){
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser(){
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    /**
     * Get the value of category
    */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    

    /**
     * Get the value of locked
     */ 
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set the value of locked
     *
     * @return  self
     */ 
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get the value of dateTopic
     */ 
    public function getDateTopic()
    {
        return $this->dateTopic;
    }

    /**
     * Set the value of dateTopic
     *
     * @return  self
     */ 
    public function setDateTopic($dateTopic)
    {
        $this->dateTopic = $dateTopic;

        return $this;
    }
    public function __toString(){
        return $this->titre;
    }

    public function formatDateTopic($format = 'd/m/Y  H:i:s') {
        $dateTime = new \DateTime($this->dateTopic);
        return $dateTime->format($format);
    }

  
}