<?php
    $users = $result["data"]['users']; 

?>

<h1>Liste des Users</h1>

<ul>
    <?php foreach($users as $user) { ?>
        <p>Pseudo : <?= $user->getPseudo()?></p>
        <p> Date d'inscription : <?= $user->getDateInscription()?></p> <br>
        
    <?php }

    ?>
    