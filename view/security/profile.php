<?php
     $topics = $result["data"]['topics']; 
      $user = App\Session::getUser();
      //var_dump($topics);die;
?>

<div id="wrapper-profile">

    <h1> Mon profil: </h1> <br>
    <div class="infos-profile">
        Pseudo :  <?=  App\Session::getUser()->getPseudo() ?> <br>
        Date d'inscription :  <?=  App\Session::getUser()->formatDateInscription() ?> <br>
    </div>
    <div class="topic-profile">
        <h2>Mes topics: </h2><br>

        <?php if($topics) {
            
                foreach ($topics as $topic) { ?>
                <ul>
                    <li> <a href="index.php?ctrl=forum&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getTitre() ?> (<?=$topic->getDateTopic()?>)</a> <?php ?> </li>
                </ul>
                <?php } }?>
    </div>
    <div class="delete-profile">
    <a href="index.php?ctrl=security&action=deleteProfile&id=<?= $user->getId() ?>">Supprimer mon profil</a></p> <?php
            //var_dump($topics);die;
        ?>
    </div>
</div>