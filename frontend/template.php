<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Bienvenue sur le blog de Jean Forte-Roche. Le roman du moment est Billet simple pour l'Alaska" />
  <meta name="author" content="Said LITIM" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="theme-color" content="#007bff" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="public/css/style.css" rel="stylesheet" type="text/css" /> 
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=cd8452ybhvrdcqvv4sqlvyr3b91nduxtmmhdfdv0overwz74"></script>
  <script>
    tinymce.init({
    	selector: '#mytextarea',
    	mode : "textareas",
    	toolbar: "forecolor backcolor"
    });
  </script>
  
  <style type="text/css"> 
    footer{
      padding: 0;
      float: bottom;
      margin-top: 150px;
    }
    footer .container{ 
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 5em 0;
      color: white;
      height: 200px;
      float: bottom;
    }

    footer img{
      height: 150px;
    }

    footer ul li{
      list-style: none;
    }  
  </style>
</head>

<body>


  <?= 

  $content; 

  ?>
  <script type="text/javascript" src="public/js/script.js"></script> 

</body>

</html>