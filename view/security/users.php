<?php
    $users = $result["data"]['users']; 
    $user = App\Session::getUser();

   

?>
<div id="wrapper-users">
<h1>Liste des Users</h1>

<ul>

    <?php 

    foreach($users as $user) { 
            if($user->getRole()==="ROLE_USER") { ?>
            <div class="users">
       <div class="user">
        <p>Pseudo : <?= $user->getPseudo()?></p>
        <p> Date d'inscription : <?= $user->getDateInscription()?></p> <br>
           <?php  if ($user->getBan() === 0  ) { 
            ?> <p><a href="index.php?ctrl=forum&action=banUser&id=<?= $user->getId() ?>">Ban l'utilisateur</a></p> <?php }
            else if($user->getBan()=== 1) { ?> <p><a href="index.php?ctrl=forum&action=debanUser&id=<?= $user->getId() ?>">Deban l'utilisateur</a></p> <?php } 
         }
         ?> 
         </div> 
        </div>
        <?php }
   

    ?> 
    </div>