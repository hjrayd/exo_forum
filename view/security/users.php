<?php
    $users = $result["data"]['users']; 
    $user = App\Session::getUser();
    $ban = App\Session::getUser() ? App\Session::getUser()->getBan() : null; 
   

?>

<h1>Liste des Users</h1>

<ul>

    <?php 
$role = App\Session::getUser() ? App\Session::getUser()->getRole() : null; 
    if ($user->getRole()==="ROLE_ADMIN") {
    foreach($users as $user) { 
            if($user->getRole()==="User") { ?>
       
        <p>Pseudo : <?= $user->getPseudo()?></p>
        <p> Date d'inscription : <?= $user->getDateInscription()?></p> <br>
        <?php } else if ($ban === 1) { ?>
            <p><a href="index.php?ctrl=forum&action=debanUser&id=<?= $user->getId() ?>">Ban l'utilisateur</a></p>
        <?php } else { ?>
         <p><a href="index.php?ctrl=forum&action=banUser&id=<?= $user->getId() ?>">Deban l'utilisateur</a></p> <?php }
            } 
        
    } 


    ?>