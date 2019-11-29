<?php 
$title = 'Inscription';
ob_start(); ?>

<style type="text/css">
  body{
    background: #007bff;
    background: linear-gradient(to right, #0060E6, #33AEFF);
  }
</style>

<div class="row">
  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin my-5">
      <div class="card-body">
        <h5 class="card-title text-center">Enregistrez vous</h5>
        <form id="formreg" class="form-signin" onsubmit="return validateForm()" href="/registering" action="registering" method="post">
          <div class="form-label-group">
            <input type="text" id="inputPseudo" class="form-control" placeholder="Pseudo" name="pseudoreg" required autofocus>
            <label for="inputPseudo">Pseudo</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="registPassword" class="form-control" placeholder="Mot de passe" name="passreg" required>
            <label for="inputPassword"></label>
          </div>
          <div class="form-label-group">
            <input type="password" id="registPassword2" class="form-control" placeholder="Retaper votre mot de passe" name="passreg2" required>
            <label for="inputPassword"></label>
          </div>
          
          <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value ="INSCRIPTION">    
          
        </form>
        <p id="infoMdp"></p>
      </div>
    </div>
  </div>
</div>
</div>

<?php $content = ob_get_clean();
require('template.php'); ?>