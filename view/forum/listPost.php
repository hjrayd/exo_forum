<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts'];
    $user = App\Session::getUser();
    $userId = App\Session::getUser() ? App\Session::getUser()->getId() : null;
    $role = App\Session::getUser() ? App\Session::getUser()->getRole() : null;  
    $ban = App\Session::getUser() ? App\Session::getUser()->getBan() : null;  

?>
<div id="wrapper-post">

    <h1><?=$topic->getTitre()?></h1> <bR>
    <?php

    if ($posts) { 
        ?>
    <div class="posts">
                <?php
        
        foreach($posts as $post ){
            ?>
            <div class="post-content"> <?php 
                $postUser = $post->getUser();
                //on vérifie que le user du post existe
                if($postUser){
                    //on récupère son pseudo
                    $postUserId = $postUser->getId();
                    $postUserPseudo = $postUser->getPseudo();
                } else {
                    //si le user n'existe pas on remplace le "null" par "utilisateur supprimé"
                    $postUserId = null;
                    $postUserPseudo = "Utilisateur supprimé";
                }
              ?>
                <p><?= $postUserPseudo?> : <?= $post->getTexte() ?> (<?= $post->formatDatePost() ?>)</p> <br>
                <?php
                if($userId && ($postUserId == $userId || $role == "ROLE_ADMIN")) { ?>
                    <a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>">Supprimer le post</a> <?php
                } ?>
            </div> 
   
    <?php } ?>
     </div>
     <?php
    } else {
        echo"Pas de post"; 
    }

    ?> <br>

<?php if ($topic->getLocked()) {
    echo "Le topic est verrouillé"; } 
    else if ($ban === 1) {
        echo "Vous êtes banni";
    } 
    else if($userId) {  ?>
    <form action="index.php?ctrl=forum&action=addPost&id=<?=$topic->getId() ?>" method="POST">
        <textarea name="texte" id="texte" rows="4" cols="50">
        </textarea>
            <input type="submit" value="poster">
    </form> <br> 
    <?php } 
   
  ?>
  </div>