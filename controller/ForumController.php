<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\UserManager;
use Model\Entities\User;


class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["nomCategory", ""]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $categoryManager = new CategoryManager();
        $topicManager = new TopicManager();
        $category = $categoryManager->findOneById($id);
        
        $topics = $topicManager->findTopicsByCategory($id);
        if($category) {
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    } else {
        $this->redirectTo("forum", "index");
    
    }
    }


    public function listPostsByTopics($id) {

        $topicManager = new TopicManager();
        $postManager = new PostManager();
     

        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostsByTopics($id);
      
        if($topic){
        return [
            "view" => VIEW_DIR."forum/listPost.php",
            "meta_description" => "Liste des post par topics : ",
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    } else {
        $this->redirectTo("forum", "index");
    }
    }

    public function addPost($id) {

        $postManager = new PostManager();
      
      
        $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($texte) {
            $postManager->add([
                "texte"=> $texte, 
                "topic_id" => $id,
                "user_id" => Session::getUser()->getId()
            ]);

     
          
            $this->redirectTo("forum", "listPostsByTopics", $id);
        } else {
            $this->redirectTo("forum", "listPostsByTopics", $id);
        }
    
    }

    public function addTopic($id) {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($titre && $texte) {
            $idTopic = $topicManager->add([
                "titre"=> $titre,
                "locked"=> 0,
                "category_id" => $id,
                "user_id" =>  Session::getUser()->getId()
            ]);

                $postManager->add([
                    "texte"=> $texte, 
                    "topic_id" => $idTopic,
                    "user_id" =>  Session::getUser()->getId()
                ]);

                $this->redirectTo("forum", "listTopicsByCategory", $id);
        } else {
            $this->redirectTo("forum", "listTopicsByCategory", $id);
        }
    }

    public function lockTopic($id) {
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);

        if ($topic) {
            $topicManager->closeTopic($id);
           

                $this->redirectTo("forum", "listTopicsByCategory", $id);
            } else {
                echo "Vous ne pouvez pas verrouiller ce topic";
            } 
        } 

    

    public function unlockedTopic($id) {
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);

        if ($topic) {
            $topicManager->openTopic($id);

                $this->redirectTo("forum", "listTopicsByCategory", $id);
            } else {
                echo "Vous ne pouvez pas verrouiller ce topic";
            } 
        } 



            public function deleteTopic($id) {
                $topicManager = new TopicManager();
                $postManager = new PostManager();
                $topic = $topicManager->findOneById($id);
        
                if ($topic) {
                    $postManager->suppAllPost($id);
                    $topicManager ->suppTopic($id);
        
                        $this->redirectTo("forum", "listTopicsByCategory", $id);
                    } else {
                        echo "Vous ne pouvez pas supprimer ce topic";
                    } 
                } 

                public function deletePost($id) {
                    $postManager = new PostManager();
                    $post = $postManager->findOneById($id);
            
                    if ($post) {
                        $postManager->suppPost($id);

                            $this->redirectTo("forum", "listPostsByTopics", $id);
                        } else {
                            echo "Vous ne pouvez pas supprimer ce post";
                        } 
                    } 

                    public function banUser($id) {
                        $userManager = new UserManager();
                        $user = $userManager->findOneById($id);
                
                        if ($user) {
                            $userManager->ban($id);
                          
                
                            $this->redirectTo("home", "users");
                            } else {
                                echo "L'utilisateur n'a pas pu être banni";
                            }
                        } 
                
                    public function debanUser($id) {
                        $userManager = new UserManager();
                        $user = $userManager->findOneById($id);
                
                        if ($user) {
                            $userManager->deban($id);
                           
                
                            $this->redirectTo("home", "users");
                            } else {
                                echo "L'utilisateur n'a pas pu être debanni";
                            } 
                        } 

                      
                            



    }

    



 
