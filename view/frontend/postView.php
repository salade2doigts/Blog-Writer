<?php $title = htmlspecialchars($post['title']);


?>

<?php ob_start();
require('header.php');
?>

<p id="signConfMess" class="bg-success">Le commentaire a bien été signalé!</p>
<header class="text-black headerPost">
    <div class="container text-center">
        <h2> <?= htmlspecialchars($post['title']) ?></h2>
        <p class="lead">Article</p>
    </div>
</header>
<a class='text-white' href="http://localhost:8080/BlogRouteur/">
    <p class="bg-primary pPost"><i class="fas fa-arrow-left fa-2x"></i></p>
</a>

<div class="news card">
    <h2 class='card-title dateArt'>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h2>

    <p class='card-text'>
        <?= html_entity_decode(nl2br(htmlspecialchars($post['post']))) ?>

</div>
<div class="container">
    <h2>Commentaires</h2>

    <?php if (isset($_SESSION['pseudo']) && isset($_SESSION['id'])) {  ?>
        <form onsubmit="return validateComm()" href="/addComment/<?= $post['id'] ?>" action="/addComment/<?= $post['id'] ?>" method="post">

            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" required></textarea>
            </div>
            <div>
                <input type="submit" value="Ajouter" />
            </div>
        </form>
        <p>Le commentaire ne doit pas être vide et ne doit pas contenir que des espaces</p>
    <?php
    }
    ?>


    <?php
    while ($comment = $comments->fetch()) {
        ?>
        <p class="card-title"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong></p>
        <div class="card w-50 p-3">
            le <?= $comment['comment_date_fr'] ?><br>
            <p class="card-text"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <?php if (isset($_SESSION['pseudo']) && isset($_SESSION['id'])) {
                    if ($comment['report'] == 1) { ?>
                    <a class="btn btn-danger" id="report" href="./post/<?= $post['id'] ?>/<?= $comment['id'] ?>"><i class="fas fa-exclamation-triangle"></i>Ce commentaire a été signalé</a>
                <?php
                        } else { ?>
                    <a class="btn btn-warning" id="report" href="./post/<?= $post['id'] ?>/<?= $comment['id'] ?>"">Signaler</a> 
            <?php }
                }
                ?>
    </div>
    
<?php } ?>
</div> 

<script type=" text/javascript"> var report=document.getElementById('report'); report.onclick=function() { document.getElementById("signConfMess").style.display=block; console.log('click'); e.preventDefault(); }; </script> <?php
                                                                                                                                                                                                                                require('footer.php');
                                                                                                                                                                                                                                $content = ob_get_clean();
                                                                                                                                                                                                                                require('template.php'); ?>