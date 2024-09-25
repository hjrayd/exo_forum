<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des Posts</h1>

<?php
foreach($posts as $post ){ ?>
    <p><a href=""><?= $post ?></a> par <?= $post->getUser() ?></p>
<?php }