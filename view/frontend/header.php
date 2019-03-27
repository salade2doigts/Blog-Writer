
<?php ob_start(); ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Jean Forte-Roche</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=toConnect">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php $header = ob_get_clean(); ?>

<?php require('template.php'); ?>