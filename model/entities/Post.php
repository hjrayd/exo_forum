<?php
namespace Model\Entities;

use App\Entity;

final class Post extends Entity {
    private $id_post;
    private $texte;
    private $datePost;
    private $topic;
    private $user;

    public function __construct($data){         
        $this->hydrate($data);        
    }
    
    /**
     * Get the value of idPost
     */ 
    public function getIdPost()
    {
        return $this->id_post;
    }

    /**
     * Set the value of idPost
     *
     * @return  self
     */ 
    public function setIdPost($id_post)
    {
        $this->id_post = $id_post;

        return $this;
    }

    /**
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get the value of datePost
     */ 
    public function getDatePost()
    {
        return $this->datePost;
    }

    /**
     * Set the value of datePost
     *
     * @return  self
     */ 
    public function setDatePost($datePost)
    {
        $this->datePost = $datePost;

        return $this;
    }

    /**
     * Get the value of topic
     */ 
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     *
     * @return  self
     */ 
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }


}