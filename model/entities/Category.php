<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Category extends Entity{

    private $id_category;
    private $nomCategory;

    // chaque entité aura le même constructeur grâce à la méthode hydrate (issue de App\Entity)
    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getNomCategory(){
        return $this->nomCategory;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNomCategory($nomCategory){
        $this->nomCategory = $nomCategory;
        return $this;
    }

    public function __toString(){
        return $this->nomCategory;
    }
}