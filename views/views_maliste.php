<?php 
  include('modele/formation_modele.php');
 $my = new MesFormation();

 ?>


<table class="table table-hover">
	<thead>
		<tr>
			<th>NOM</th>
			<th>PRIX</th>
		</tr>
	</thead>
	<tbody>
		    <?php foreach ($my->MaListe() as $reponse) : ?>
		    	<tr>
				  	<th><p>NOM : <?= $reponse['nom_formation'] ?></p></th>
				  	<th><p>Prix : <?= $reponse['prix'] ?></p></th>
			  	</tr>	
		    <?php endforeach ?>
    </tbody>
 
</table>