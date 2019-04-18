<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

	    <!-- Include Editor style. -->
	    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css"/>
	    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link href="public/css/style.css" rel="stylesheet" type="text/css" /> 
 		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=cd8452ybhvrdcqvv4sqlvyr3b91nduxtmmhdfdv0overwz74"></script>
  		<script>
  		tinymce.init({
    	selector: '#mytextarea',
    	mode : "textareas",
    	toolbar: "forecolor backcolor"
  		});
  		</script>
    </head>
        
    <body>

        
        <?= 

        $content; 

        ?>

	<script type="text/javascript" src="public/js/script.js"></script> 
    </body>

</html>