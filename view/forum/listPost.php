<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts'];
    

?>

<h1><?=$topic->getTitre()?></h1> <bR>
<?php

foreach($posts as $post ){
    $userId = App\Session::getUser() ? App\Session::getUser()->getId() : null;
    ?>

    <p><?= $post->getUser() ?> : <?= $post->getTexte() ?> (<?= $post->getDatePost() ?>)</p> <br>
        
    <?php }
    ?>

<?php if($userId) { ?>
    <form action="index.php?ctrl=forum&action=addPost&id=<?=$topic->getId() ?>" method="POST">
        <textarea name="texte" id="texte" rows="4" cols="50">
        </textarea>
            <input type="submit" value="poster">
    </form> <br>
<?php } ?>