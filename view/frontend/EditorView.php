<?php $title = 'editeur'; ?>
<a href='view/frontend/EditorView.php'>Modifier</a>
<?php ob_start(); ?>

<form action="save" method="POST">
  <textarea name="editor_content" id="froala-editor">
  	  <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
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
<!-- Include JS file. -->
<!-- Include JS file. -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>