<?php $title = 'editeur';

if(isset($_SESSION['pseudo'])&&isset($_SESSION['id'])){ 
  if($_SESSION['role'] == 1){
    require('view/frontend/header.php');
    ?>
    <style type="text/css">
        .formadm{
            margin-top: 70px;
        }
    </style>
<div class="container">
    <?php ob_start(); ?>

    <form class="formadm" action="index.php?action=addPostConfirm" method="POST" >
      
        <p>Titre de l'article</p>
        <input type="text" name="title" required> 
        <p>Contenu :</p>
        <textarea name="add_content" id="mytextarea">      
        </textarea>
      <button>Ajouter l'article</button>
    </form>
    </div>     

    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); 
  }else{
    echo 'Oups! Il semble que vous vous êtes égarés';
  }
 
}else{

  
?>
  <div>Oups! Il semble que vous vous êtes égarés</div>

<?php  
}


?>