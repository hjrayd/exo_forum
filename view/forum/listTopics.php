<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
    $user = App\Session::getUser();
    $userId = App\Session::getUser() ? App\Session::getUser()->getId() : null; 
    $role = App\Session::getUser() ? App\Session::getUser()->getRole() : null; 
    $ban = App\Session::getUser() ? App\Session::getUser()->getBan() : null; 
?>
<div id="wrapper-topic">
    <h1>Liste des topics</h1>
    
    <div class="topics">
    <?php 
   
        if ($topics) {
            foreach($topics as $topic ){ 
                if($userId && ($topic->getUser()->getId() == $userId || $role == "ROLE_ADMIN")) {
                    ?> 
                  
                        <div class="delete-btn">
                            <p><a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">Supprimer le topic</a></p> 
                        </div> 
                        <?php 
                        { if ($topic->getLocked()===0) {?>
                        <div class="lock-btn">
                            <p><a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">Verrouiller le topic</a></p>
                        </div>
                        <?php } if ($topic->getLocked()===1) { ?>
                        <p><a href="index.php?ctrl=forum&action=unlockedTopic&id=<?= $topic->getId() ?>">Déverouiller le topic</a></p>
                 
            <?php } 
            } 
        }  ?>
        <p><a href="index.php?ctrl=forum&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?= $topic->getTitre() ?> </a> par <?= $topic->getUser() ?> (<?= $topic->formatDateTopic() ?>)</p>
    <?php } ?>
        
    <?php } else {
        echo "Pas de topics";
    }

    ?>
    </div>

    <?php  if ($ban === 1) {
        echo "Vous êtes banni";
    } else if($userId) { 
        ?>
    <div class="topic-form">
        <form action="index.php?ctrl=forum&action=addTopic&id=<?=$category->getId() ?>" method="POST">
            <label for="titre">Titre:</label><br>
            <input type="titre" name="titre"><br>
            <textarea name="texte" id="texte" rows="4" cols="50">
            </textarea>
            <input type="submit" value="submit">
        </form>
    </div>
    <?php } 
    ?>
</div>