<?php

 $reponse = $_SESSION['MEmploie'];

 ?>
      
      <table class="table table-hover">
      	<thead>
      		<tr>
      			<th>Nom Emploie</th>
      			<th>Prenom Emploie</th>
      			<th>Jour Disponible</th>
      			<th>Credit Actuelle</th>
      			<th>Secteur D'activite</th>
      		</tr>
      	</thead>
      	<tbody>
      		<tr>
      			<td><?= $reponse['nom_emploie'] ?></td>
      			<td><?= $reponse['prenom_emploie'] ?></td>
      			<td><?= $reponse['jour'] ?></td>
      			<td><?= $reponse['credit'] ?></td>
      			<td><?= $reponse['titre'] ?></td>
      		</tr>
      	</tbody>
      </table>
<br>
<br>
<br>
<br>
<br>

<h2> Liste de tout le formation de L'emploie <?= $reponse['nom_emploie'] ?></h2>

<table class="table table-hover">
	<thead>
		<tr>
			<th>id_Formation</th>
			<th>Nom emploie</th>
			<th>id For_active</th>
			<th>nom formation</th>
			<th>status</th>
			<th>Date d'inscription</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($_SESSION['MFormation'] as $donne) : ?>
                      <tr>
                      	<td><?= $donne['id_forme'] ?></td>
                      	<td><?= $donne['nom_p'] ?></td>
                        <?php if(!$donne['statuts_a'] == 1) { ?>
                        <td>
                        <?= '<a href="controleur/controle_gestion.php?accepte='.$donne['id_active'].'&id='.htmlspecialchars($_GET['id']).'"><button type="button" class="btn btn-success">'. "Accepté".'</button></a>' ?>
                        <?= '<a href="controleur/controle_gestion.php?refuse='.$donne['id_active'].'&id='.htmlspecialchars($_GET['id']).'"><button type="button" class="btn btn-danger">'. "Refuse".'</button></a>' ?>
                        </td>
                      	<?php 
                        }
                        else
                        {
                        	echo "<td>...</td>";
                        }
                         ?>	

                      	<td><?= $donne['nom_f'] ?></td>
                      	<?php 
                           switch ($donne['statuts_a']) {
                           	case 0:
                           		echo "<td> Demande </td>";
                           		break;
            	          	case 1:
	                   		    echo "<td> valide </td>";
                       		break;
                       		case 2:
	                   		    echo "<td> refuse </td>";
                       		break;
                           	default:
                           		echo "<td> pas de parametre </td>";
                           		break;
                           }
                      	?>
                      	<td><?= $donne['date_actuelle'] ?></td>
                      </tr>    
  
        <?php endforeach ?>	
	</tbody>
</table>
<?php
	//affiche une reponse si la demande a ete envoie.
		if(isset($_GET['msg']))
		{
			$message = $_GET['msg'];
		    include('partial/info_admin.php');
		}
    
?>
<a href="profil/admin">Retour</a>
<br>
<br>
<br>
<a href="controleur/logout_admin.php">Deconnexion</a>
