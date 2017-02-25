
<a href="controleur/logout_admin.php">Deconnexion</a>
<br>
<?PHP  $donne = $_SESSION['GetAdmin']; ?>
 <h1><?= $donne['nom_admin'] ?></h1>
 <h1><?= $donne['prenom_admin'] ?></h1>
 <h1><?= $donne['titre_admin'] ?></h1><br>


<h2>Liste de tout les emploie du service <?= $donne['titre_admin'] ?></h2>
<?php foreach ($_SESSION['MesEmploie'] as $donnees) : ?>
   <h3><?= $donnees['nom_emploie'] ?></h3>
   <h3><?= $donnees['prenom_emploie'] ?></h3>
   <h3><?= '<a href="controleur/controler_admin_formation.php?emploie='.$donnees['id_emploie'].'"><button type="button" class="btn btn-primary">'. $donnees['id_emploie'].'</button></a>' ?></h3>
<?php endforeach ?>

