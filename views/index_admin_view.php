<div>
	<form method="post" action="controleur/login_admin.php">
	
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nom :</span>
  <input type="text" name="nom_admin" class="form-control" placeholder="Entrez votre nom" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Mot de passe :</span>
  <input type="password" name="mdp_admin" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div>
		<button type="submit" class="btn btn-default">Login</button>
	</form>
  <p> Vous été Emploie : <a href="index.php">Login Emploie</a></p>
	<?php include('./partial/errors.php'); ?>
              <?php
              //affiche les erreurs si nom et le mot de passe sont incorrecte.
                 if (isset($errmsg)) 
                 { 
                    echo '<p style="color:red;text-align:center;">' . $errmsg . '</p>'; 
                 }
              ?>
</div>

