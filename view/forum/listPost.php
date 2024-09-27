<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 

?>

<h1>Liste des Posts</h1> <bR>
<?php

foreach($posts as $post ){ ?>

    <p><?= $post->getUser() ?> : <?= $post->getTexte() ?> (<?= $post->getDatePost() ?>)</p> <br>
        
    <?php }
    ?>

<form action="index.php?ctrl=forum&action=addPost&id=<?=$topic->getId() ?>" method="POST">
<textarea name="texte" id="texte" rows="4" cols="50">
</textarea>
<input type="submit" value="poster">
</form> <br>