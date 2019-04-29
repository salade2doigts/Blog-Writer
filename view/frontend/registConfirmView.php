<?php 
$title = 'Connexion'; 
?>
<style type="text/css">
  body{
    background: #007bff;
    background: linear-gradient(to right, #0060E6, #33AEFF);
  }

  #confirm{

  	text-align: center;
  	margin-top: 200px;
  	color: white;
  	font-size:  25px;
  }

  #btn2{
  	margin: 10px;
  }
  
</style>
<?php ob_start();?>

<div id="confirm"><p>Votre compte a été enregistré avec succès. Vous pouvez désormais vous connecter et poster des commentaires.</p><div>
	<a href="index.php" class="btn btn-litgh bg-light">Retour à l'accueil</a><br>
	<a id="btn2" href="index.php?action=toConnect" class="btn btn-litgh bg-light">Page de connexion</a>
  <?php $content = ob_get_clean();
  require('template.php'); ?>