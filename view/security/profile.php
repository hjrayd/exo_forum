<?php
     $topics = $result["data"]['topics']; 
      $user = App\Session::getUser();
      //var_dump($topics);die;
?>

Mon profil: <br>
    Pseudo :  <?=  App\Session::getUser()->getPseudo() ?> <br>
    Date d'inscription :  <?=  App\Session::getUser()->getDateInscription() ?> <br>

Mes topics: <br>

   
        <?php
        foreach ($topics as $topic) { ?>
        <ul>
            <li> <?= $topic->getTitre() ?> </li>
        </ul>
         <?php } 

        //var_dump($topics);die;
    ?>