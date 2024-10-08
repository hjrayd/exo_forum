<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use App\Manager;
use App\Session;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

        //fonction register
    public function register () {
        $userManager = new UserManager();
        if(isset($_POST["submit"]))//faille XSS = on injecte du code malveillant dans une page web -> on filtre les champs du formulaire pour s'en prémunir 
        {
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudo && $email && $pass1 && $pass2) {
                

                if($pass1==$pass2 && strlen($pass1)>= 5) {
                    $userManager->add([
                        "pseudo" => $pseudo,
                        "password" => password_hash($pass1, PASSWORD_DEFAULT),
                        "mail" => $email,
                        "role" => "User"
                        
                    ]);
                    $this->redirectTo("security", "login");
                }
            }
        }
            return [
                "view" => VIEW_DIR."security/register.php",
            "meta_description" => "S'enregistrer"
        ];
    }

    //fonction login
    public function login () {
        $userManager = new UserManager();

        if(isset($_POST["submit"])) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($email && $password){
                $user = $userManager->findUser($email);

                if($user){
                    $hash = $user->getPassword();
                    if(password_verify($password, $hash)){
                        Session::setUser($user);
                        $this->redirectTo("forum", "index");
                    } else {
                        $this->redirectTo("security", "login");
                    }
                } else {
                    $this->redirectTo("security", "login");
                }
            }
            $this->redirectTo("security", "login");
        }
        return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Log in page"
        ];
     
                }

          //fonction logout
          public function logout () {
            if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
            $this->redirectTo("security", "login"); 
            }
        
    }

    public function profile(){
        $userManager = new UserManager();
        $topicManager = new TopicManager();

        //on récupère l'id a travers la session sinon risque de changer l'id dans l'url 
        $id = Session::getUser()->getId();
        $topics = $topicManager->listTopicsByUser($id);

        return [
            "view" => VIEW_DIR."security/profile.php",
            "meta_description" => "Mon profil",
            "data" => [ 
                "topics" => $topics 
            ]
        ];
    }

    public function deleteProfile() {
       $userManager = new UserManager();
       $id = Session::getUser()->getId();
        $userManager->deletePostTopicUser($id);
        $userManager->deleteProfile($id);
     
                $this->redirectTo("security", "logout");
            } 

}

//pq bcrypt est un algo fort = il utilise le salt + le cout + le mdp hash donc plus long
//pq on utilise bcrypt = algo fort 