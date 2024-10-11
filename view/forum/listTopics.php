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
    
            if ($topics) { ?>
                <div class="posts">
                    <?php
                
                foreach($topics as $topic ){ 
                    
                    
                        $topicUser = $topic->getUser();
                        if($topicUser){
                            $topicUserId = $topic->getUser()->getId();
                            $topicUserPseudo = $topicUser->getPseudo();
                        } else {
                            $topicUserId = null;
                            $topicUserPseudo = "Utilisateur supprimé";
                        } ?>
                        <div class="topic">
                        <div class="topic-name">
                                <p><a href="index.php?ctrl=forum&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?= $topic->getTitre() ?> </a> par <?= $topicUserPseudo ?> <br> (<?= $topic->formatDateTopic() ?>) </p>  
                            </div>
                            <?php
                        if($userId && ($topicUserId == $userId || $role == "ROLE_ADMIN")) {?> 
                        
                            <div class="topic-btn">
                                    <div class="delete-btn">
                                        <p><a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">Supprimer le topic</a></p> 
                                    </div> 
                                    <?php 
                                    { if ($topic->getLocked()===0) {?>
                                    <div class="lock-btn">
                                        <p><a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">Verrouiller le topic</a></p>
                                    </div>
                                        <?php } if ($topic->getLocked()===1) { ?>
                                    <div class="lock-btn">
                                        <p><a href="index.php?ctrl=forum&action=unlockedTopic&id=<?= $topic->getId() ?>">Déverouiller le topic</a></p>
                                    </div>
                            
                            <?php } ?> </div> <?php
                                } 
                            }?>

                           
                        </div>
                    <?php } ?> 
    
            
          </div>
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