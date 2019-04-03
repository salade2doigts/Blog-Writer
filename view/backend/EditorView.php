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

    <a href='view/frontend/EditorView.php'>Modifier</a>
    <?php ob_start(); ?>

    <form class="formadm" action="index.php?action=modifPost&amp;id=<?= $post['id'] ?>" method="POST" >
      <textarea name="editor_content" id="froala-editor">
      	  <h3>
            <?= htmlspecialchars($post['title']) ?>
        
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['post'])) ?>
        </p>
      </textarea>
      <button>Submit</button>
    </form>
     
    <script>
      $(function() {
        $('#froala-editor').froalaEditor({
          toolbarSticky: false
        })
      });
    </script>

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