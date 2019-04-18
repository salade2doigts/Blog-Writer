

<?php $title = 'Mon blog';

if(isset($_SESSION['pseudo'])&&isset($_SESSION['id'])){ 
  if( $_SESSION['role'] == 1 ||  $_SESSION['role'] == 2){

require('view/frontend/header.php');

?>




<?php ob_start(); ?>

<a href="DashBoardViewComm.php"></a>

<header class="text-black">
    <div class="container text-center">

      <h2 class="lead">Panneau d'administration</h2>
    </div>
</header>

<div class="container">
<button class="btn btn-info btn-lg btn-block"><a href='index.php?action=dashboard'>Gestion des articles</a></button><br>
<div>
 <h3>Commentaires signalés</h3>

<?php
while ($commentR = $commentsReport->fetch())
{
?>
        <div class="card">
<p><strong><?= htmlspecialchars($commentR['pseudo']) ?></strong></p>
     le <?= $commentR['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($commentR['comment'])) ?></p>
    <p><?= nl2br(htmlspecialchars($commentR['id'])) ?></p>
    <a href="index.php?action=delComm&amp;id=<?= $commentR['id'] ?>">Supprimer le commentaire</a>
    </div>


<?php
} ?>

</div>

<div>
<h3>Autres Commentaires</h3>
  
<?php
while ($comment = $commentsB->fetch())
{
?>
        <div class="card">
<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong></p>
     le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><?= nl2br(htmlspecialchars($comment['id'])) ?></p>
    <a href="index.php?action=delComm&amp;id=<?= $comment['id'] ?>">Supprimer le commentaire</a>
    </div>


<?php
}


$content = ob_get_clean(); 

require('view/frontend/template.php');
    
}else{

    echo 'Vous vous êtes egarés';

}

}else{
    echo 'Vous vous êtes egarés';
}
    ?>
    </div>
</div> 


