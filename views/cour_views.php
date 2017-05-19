<?php 

    include('modele/cour_modele.php');

	$my = new MesCour();
	$donnees = $my->getcour(htmlspecialchars($_GET['cour']));
?>
<div class="container">
	<div class="row">
		<div class="header_main">	
			<div class="head-main col-md-9 col-xs-9">
				<div class="profile-cour">
					<?= '<img src="img/Profil/'.$_SESSION['id'].'.png">' ?>
					<div class="profile-cour-descrip">
						<h1 class="profile-content">Nom : <?= $_SESSION['nom'] ?></h1>
						<h1 class="profile-content">PRENOM : <?= $_SESSION['prenom'] ?></h1>
						<h1 class="profile-content">TITRE : <?= $_SESSION['titre'] ?></h1>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-xs-3">
				<div class="content-logo">
				<a href="home"><img src="img/Profile_banner_1.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
// on doit faire de condition pour verifie que le status = 1
foreach ($donnees as $reponse) :
	//et on affiche le cour si la condition est vraie.
       if($reponse['status'] == 1 AND $_SESSION['id'] == $reponse['id_emploie']) 
       {
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12">
		    <div class="thumbnail">
		        <?=  '<img src="img/'.$reponse['id_formation'].'.png" alt="...">' ?>
			    <div class="caption">
			    	<h3><?= $reponse['nom_formation'] ?></h3>
			    	<p><span class="label label-primary">Date Formation : <?= $reponse['la_date'] ?></span> <span class="label label-info">Date inscription : <?= $reponse['date_act'] ?></span></p>
			        
			        <p><?= $reponse['contenu'] ?></p>
			        <iframe width="100%" height="580" src="<?= $reponse['linkCour'] ?>" frameborder="0" allowfullscreen></iframe>
			        
			    </div>
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