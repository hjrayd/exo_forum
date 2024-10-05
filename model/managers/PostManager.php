<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager {
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }

    public function findPostsByTopics($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName."  
                WHERE topic_id = :id
                ORDER BY datePost";

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
           
        );
    }

    public function suppPost($id) {

        $sql = "DELETE FROM post
        WHERE topic_id = :id";
        DAO::delete($sql, ['id' => $id]);
    }
   
}

