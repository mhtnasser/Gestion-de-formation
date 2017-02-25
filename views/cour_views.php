<?php 

    include('modele/cour_modele.php');

	$my = new MesCour();
	$donnees = $my->getcour(htmlspecialchars($_GET['cour']));
?>

	<h1>Nom : <?= $_SESSION['nom'] ?></h1>
	<h1>PRENOM : <?= $_SESSION['prenom'] ?></h1>
	<h1>TITRE : <?= $_SESSION['titre'] ?></h1>

<?php
// on doit faire de condition pour verifie que le status = 1
	foreach ($donnees as $reponse) :
		//et on affiche le cour si la condition est vraie.
	       if($reponse['status'] == 1 AND $_SESSION['id'] == $reponse['id_emploie']) 
	       {
	?>
		<div class="container">
			<div class="row">

				<div class="col-xs-6 col-md-3">
				    <div class="thumbnail">
				      <?=  '<img src="img/'.$reponse['id_formation'].'.png" alt="...">' ?>
				    </div>
			    </div>

				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				        <?=  '<img src="img/'.$reponse['id_formation'].'.png" alt="...">' ?>
					    <div class="caption">
					        <h3><?= $reponse['nom_formation'] ?></h3>
					        <p><?= $reponse['contenu'] ?></p>
					        <p><span class="label label-primary">Date Formation : <?= $reponse['la_date'] ?></span> <span class="label label-info">Date inscription : <?= $reponse['date_act'] ?></span></p>
					    </div>
				    </div>
				</div>

				<div class="col-xs-6 col-md-3">
				    <div class="thumbnail">
				        <?=  '<img src="img/'.$reponse['id_formation'].'.png" alt="...">' ?>
				    </div>
				</div>

		    </div>
		</div>

	<?php }
	    else
	    {
	 	    echo "vous n'aves pas le droit, t'edite cette page";
	 	} 
	endforeach ?>