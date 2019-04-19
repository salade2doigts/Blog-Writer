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
<a class='text-white' href="index.php"><p class="bg-primary pPost"><i class="fas fa-arrow-left fa-2x"></i></p></a>

<div class="news card">
    <h2 class='card-title dateArt'>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h2>
    
    <p class='card-text'>
        <?= html_entity_decode(nl2br(htmlspecialchars($post['post']))) ?>
    </p>
</div>
<div class="container">
<h2>Commentaires</h2>

<?php     if(isset($_SESSION['pseudo'])&&isset($_SESSION['id'])){  ?>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Ajouter"/>
    </div>
</form>

<?php
}
?>


<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong></p>
     le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <a class="btn btn-danger" id="report" href="index.php?action=signal&amp;id=<?=$post['id']?>&amp;idComm=<?=$comment['id']?>">Signaler<a> 

  
<?php
}

?></div> 

<script type="text/javascript">
var report = document.getElementById('report');   
report.onclick = function() {

        document.getElementById("signConfMess").style.display = block;
        console.log('click');

        e.preventDefault();
    };   </script>

<?php
$content = ob_get_clean(); 

 require('template.php');
 require('footer.php'); ?>
