<div class="">
 <div class="mail-box">
    <aside class="sm-side">
        <div class="user-head">
            <a class="inbox-avatar" href="profil/admin">
                <img  width="64" hieght="60" src="http://med.stanford.edu/employeerecognition/2013/30years/_jcr_content/main/panel_builder/panel_0/text_image_6.img.620.high.png">
            </a>
            <div class="user-name">
            <?PHP  $donne = $_SESSION['GetAdmin']; ?>
                <h5><?= $donne['nom_admin'] ?></h5>
                <span><?= $donne['prenom_admin'] ?></span>
            </div>

        </div>
        <div class="inbox-body">
            <a href="controleur/logout_admin.php" class="btn btn-deconnexion">Deconnexion</a>
        </div>
    </aside>

    <aside class="lg-side">
        <div class="inbox-head">
            <h3><?= $donne['titre_admin'] ?></h3>
        </div>
        <div class="inbox-body">
           <div class="mail-option">
           <h2>Liste de tout les emploie du service <?= $donne['titre_admin'] ?></h2>
           <div class="box-list-profile">
           	<?php foreach ($_SESSION['MesEmploie'] as $donnees) : ?>
              <div class="profil-contain col-md-3">
				   <h3 class="profil-name"><?= $donnees['nom_emploie'] ?>
				       <?= $donnees['prenom_emploie'] ?></h3>
				   <div class="containeur"><?= '<a href="controleur/controler_admin_formation.php?emploie='.$donnees['id_emploie'].'"><img src="img/Profil/'.$donnees['id_emploie'].'.png" width="64" hieght="60"></a>' ?></div>
           </div>
            <?php endforeach ?>
           </div>
           </div>
        </div>
    </aside>
</div>
</div>