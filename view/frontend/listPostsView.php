<?php $title = 'Mon blog'; 
require('header.php');
?>




<?php ob_start(); ?>
<header class="text-black">
    <div class="container text-center">
      <h1>Billet simple pour l'Alaska</h1>
      <p class="lead">Nouveau Roman</p>
    </div>
</header>
<?php
while ($data = $posts->fetch())
{
?>
<div class="container">
<div class="card mb-4">
    <div class="card-body">
            <h2 class="card-title">
                <?= htmlspecialchars($data['title']) ?></h2>
                
            </h3>
            
            <p class="card-text">
                <?= nl2br(htmlspecialchars($data['post'])) ?>
                <br />
            </p>
        <a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Plus</a>
    </div>
    <div class="card-footer text-muted">
    <em>le <?= $data['creation_date_fr'] ?></em>
    </div>
</div> 
</div> 
<?php
}
$posts->closeCursor();
echo $_SESSION['id'];
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
