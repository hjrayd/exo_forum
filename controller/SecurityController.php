<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use App\Manager;
use App\Session;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        if(isset($_POST["submit"])) {
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudo && $email && $pass1 && $pass2) {
                $userManager = new UserManager();

                if($pass1==$pass2 && strlen($pass1)>= 5) {
                    $userManager->add([
                        "pseudo" => $pseudo,
                        "email" => $email,
                        "password" => password_hash($pass1, PASSWORD_DEFAULT)
                    ]);
                    $this->redirectTo("security", "login");
                }
            }
        }

        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description"=>"S'inscrire"

        ];
    }
    public function login () {
        if(isset($_POST["submit"])) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudo && $email) {
                $userManager = new UserManager();
            }
            
    }
}
    public function logout () {}
}