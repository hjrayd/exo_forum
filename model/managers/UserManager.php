<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }

    public function findUser($mail) {

        $sql = "SELECT *
        FROM user
        WHERE mail = :mail";

return  $this->getOneOrNullResult(
    DAO::select($sql, ['mail' => $mail], false), 
    $this->className);
    }

    public function ban ($id) {

        $sql = "UPDATE user
        SET ban = 1
        WHERE id_user = :id";

        DAO::update($sql, ['id' => $id]);
      
    }

    public function deban ($id) {

        $sql = "UPDATE user
        SET ban = 0
        WHERE id_user = :id";
        DAO::update($sql, ['id' => $id]);


    }

    public function deleteProfile($id) {
        $sql = "DELETE FROM user
        WHERE id_user = :id";

        DAO::delete($sql, ['id' => $id]);
    }

    public function deletePostTopicUser($id) {
        $sql = "UPDATE  post
        SET user_id = null
        WHERE user_id = :id";
        
         DAO::update($sql, ['id' => $id]);

         $sql = "UPDATE  topic
         SET user_id = null
         WHERE user_id = :id";
         
          DAO::update($sql, ['id' => $id]);
    }
    
   
}