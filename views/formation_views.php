<?php
	include('modele/formation_modele.php');

	$my = new MesFormation();
	if(isset($_GET['formation']))
    {
		// on affiche la liste de formation d'un emploie , si get_id = donnees_id on affiche 
		foreach($my->getFormation(htmlspecialchars($_GET['formation'])) as $reponse) {
	?>

		<h2><?= $reponse['nom_formation'] ?></h2>
		<h2>Dure : <?= $reponse['dure'] ?></h2>
		<h2>date de publication de la formation : <?= $reponse['la_date'] ?></h2>
		<h2>Lieux : <?= $reponse['lieux'] ?></h2>
		<h2>Les Pre-requis : <?= $reponse['pre_requis'] ?></h2>
		<h2>Cette formation coûte <?= $reponse['prix'] ?> credit</h2>
		<?php if(isset($_GET['msg'])) {
				$message = $_GET['msg'];
		        include('partial/info_flash.php');
			 }else { 
		 ?>
		<h2><?= '<a href="controleur/controler_formation.php?Demande='.$reponse['id'].'">
				<button type="button" class="btn btn-primary">Demande</button></a><a href="profil"><button type="button" class="btn btn-info">Retour</button></a>' ?></h2>
	<?php 
			}
		}
	 
	
    }