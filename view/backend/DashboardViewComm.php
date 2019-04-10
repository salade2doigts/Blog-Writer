

<?php $title = 'Mon blog';

if(isset($_SESSION['pseudo'])&&isset($_SESSION['id'])){ 
  if( $_SESSION['role'] == 1 ||  $_SESSION['role'] == 2){

require('view/frontend/header.php');

?>




<?php ob_start(); ?>

<a href="DashBoardViewComm.php"></a>

<header class="text-black">
    <div class="container text-center">

      <p class="lead">Panneau d'administration</p>
    </div>
</header>

<div class="container">


  
<?php
while ($comment = $commentsB->fetch())
{
?>
        <div>
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


