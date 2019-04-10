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
      

          <input type="text" name="title"> 
  
        <textarea name="add_content" id="froala-editor">
        
        </textarea>
      <button>Submit</button>
    </form>
    </div>     
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