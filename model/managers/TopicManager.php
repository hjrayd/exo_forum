<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName."  
                WHERE category_id = :id
                ORDER BY dateTopic DESC";

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    //verrouiller un topic

    public function closeTopic($id) {

        $sql = "UPDATE topic
        SET locked = 1
        WHERE id_topic = :id";

        DAO::update($sql, ['id' => $id]);
      
    }

    public function openTopic($id) {

        $sql = "UPDATE topic
        SET locked = 0
        WHERE id_topic = :id";
        DAO::update($sql, ['id' => $id]);


    }

    public function deleteTopic($id) {

            $sql = "DELETE topic
            WHERE id_topic = :id";

    return  $this->getMultipleResults(
        DAO::delete($sql, ['id' => $id]), 
 
    );
    }

}