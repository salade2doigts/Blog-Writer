  

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="http://localhost:8080/BlogRouteur/">Jean Forte-Roche</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost:8080/BlogRouteur/">Accueil
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <?php     if(isset($_SESSION['pseudo'])&&isset($_SESSION['id'])){  
          if( $_SESSION['role'] == 1 ){  ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>/dashboard">Administration</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="./disconnect">Deconnexion</a>    
          </li>
        <?php }elseif(!isset($_SESSION['pseudo'])&&!isset($_SESSION['id'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="./connect">Connexion</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="./register">Inscription</a>
          </li>
          <?php
        }
        ?> 
      </ul>
    </div>
  </div>
</nav>