<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    $user = App\Session::getUser();
    $userId = App\Session::getUser() ? App\Session::getUser()->getId() : null; 
    $role = App\Session::getUser() ? App\Session::getUser()->getRole() : null; 
    $ban = App\Session::getUser() ? App\Session::getUser()->getBan() : null; 
?>

<h1>Liste des topics</h1>

<?php 
    if ($topics) {
        foreach($topics as $topic ){ 
            if($userId && ($topic->getUser()->getId() == $userId || $role == "ROLE_ADMIN")) {
            ?> <p><a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">Supprimer le topic</a></p> <?php 
            { if ($topic->getLocked()===0) {?>
            <p><a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">Verrouiller le topic</a></p>
            <?php } if ($topic->getLocked()===1) { ?>
            <p><a href="index.php?ctrl=forum&action=unlockedTopic&id=<?= $topic->getId() ?>">Déverouiller le topic</a></p>
            
        <?php } 
        } 
    }  ?>
    <p><a href="index.php?ctrl=forum&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?= $topic->getTitre() ?> </a> par <?= $topic->getUser() ?> (<?= $topic->getDateTopic() ?>)</p>
<?php } ?>
     
<?php } else {
    echo "Pas de topics";
}

?>

<?php  if ($ban === 1) {
    echo "Vous êtes banni";
} else if($userId) { 
     ?>
   
<form action="index.php?ctrl=forum&action=addTopic&id=<?=$category->getId() ?>" method="POST">
    <label for="titre">Titre:</label><br>
    <input type="titre" name="titre"><br>
    <textarea name="texte" id="texte" rows="4" cols="50">
    </textarea>
    <input type="submit" value="submit">
</form>
<?php } 
?>