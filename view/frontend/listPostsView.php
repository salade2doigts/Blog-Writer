<?php $title = 'Mon blog'; 

?>




<?php ob_start();
require('header.php'); ?>
<header class="text-black">
    <div class="container text-center">
      <h1>Billet simple pour l'Alaska</h1>
      <p class="lead">Nouveau Roman</p>
    </div>
</header>

<div class="container">
<?php
while ($data = $posts->fetch())
{
?>

<div class="card mb-4">
    <div class="card-body">
            <h2 class="card-title font-weight-bold">
                <?= htmlspecialchars($data['title']) ?></h2>
                
          
            <div id="card-texto">
            <p class="card-text text-justify" >
                <?= html_entity_decode(nl2br(htmlspecialchars($data['post']))) ?>
          
                <a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite...</a>
            </p>
            
            </div>

    </div>
    <div class="card-footer text-muted">
    <em>le <?= $data['creation_date_fr'] ?></em>
    </div>
    </div> 

<?php
}

$posts->closeCursor();

?>
</div>
<?php $content = ob_get_clean(); 

require('template.php');
require('footer.php'); 
?>
