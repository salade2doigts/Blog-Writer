<?php $title = htmlspecialchars('Erreur'); 


?>

<?php ob_start(); ?>

<div id="notfound">
	<div class="notfound">
		<div class="notfound-404">
			<h3>Oops! Page not found</h3>
			<h1><span>4</span><span>0</span><span>4</span></h1>
		</div>
		<h2>Désolé mais rien n'a été trouvé...</h2>
	</div>
</div>

<?php $content = ob_get_clean();

require('frontend/template.php'); ?>