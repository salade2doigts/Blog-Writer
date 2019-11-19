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

      <form class="formadm" action="index.php?action=modifPost&amp;id=<?= $post['id'] ?>" method="POST" >

        <p class="font-weight-bold" >Titre de l'article :</p>
        <input type="text" value= '<?php echo htmlspecialchars($post['title']) ?>' name='title' required>
        <p class="font-weight-bold" >Contenu :</p>
        <textarea name="editor_content" id="mytextarea">
         
          <?= nl2br(htmlspecialchars($post['post'])) ?>
          
        </textarea>
        <button>Valider la modification</button>
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