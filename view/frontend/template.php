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
	    <!-- Include JS file. -->
		<!-- Include JS file. -->
	    <!-- Include external JS libs. -->
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
	    <!-- Include Editor JS files. -->
	    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.pkgd.min.js"></script>
	    <link href="public/css/style.css" rel="stylesheet" type="text/css" /> 
 		
    </head>
        
    <body>
    	
    	<?= $header ?>
    	
        <?= $content ?>

	 
    </body>
</html>