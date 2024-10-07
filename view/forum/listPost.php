<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts'];
    $user = App\Session::getUser();
    $userId = App\Session::getUser() ? App\Session::getUser()->getId() : null;
    $role = App\Session::getUser() ? App\Session::getUser()->getRole() : null;  
    $ban = App\Session::getUser() ? App\Session::getUser()->getBan() : null;  

?>

<h1><?=$topic->getTitre()?></h1> <bR>
<?php

if ($posts) {
foreach($posts as $post ){
    if($userId && ($post->getUser()->getId() == $userId || $role == "ROLE_ADMIN")) { ?>
        <p><a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>">Supprimer le post</a></p> <?php
    } ?>
    <p><?= $post->getUser() ?> : <?= $post->getTexte() ?> (<?= $post->getDatePost() ?>)</p> <br>
        
    <?php } 
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