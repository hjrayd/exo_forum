<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
     <p><a href="index.php?ctrl=forum&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?= $topic->getTitre() ?> </a> par <?= $topic->getUser() ?> (<?= $topic->getDateTopic() ?>)</p>
<?php }

?>

<form action="index.php?ctrl=forum&action=addTopic&id=<?=$category->getId() ?>" method="POST">
    <label for="titre">Titre:</label><br>
    <input type="texte" name="texte"><br>
    <textarea name="texte" id="texte" rows="4" cols="50">
    </textarea>
    <input type="submit" value="submit">
</form>