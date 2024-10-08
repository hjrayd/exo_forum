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
         <?php } ?>

<a href="index.php?ctrl=security&action=deleteProfile&id=<?= $user->getId() ?>">Supprimer mon profil</a></p> <?php
        //var_dump($topics);die;
    ?>