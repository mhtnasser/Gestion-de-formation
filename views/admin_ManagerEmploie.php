
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
            <a href="profil/admin" class="btn btn-retour">Retour</a>
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
           
          <?php $reponse = $_SESSION['MEmploie']; ?>
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nom Emploie</th>
            <th>Prenom Emploie</th>
            <th>Jour Disponible</th>
            <th>Credit Actuelle</th>
            <th>Secteur D'activite</th>
            <th>Derniere connecxion</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $reponse['nom_emploie'] ?></td>
            <td><?= $reponse['prenom_emploie'] ?></td>
            <td><?= $reponse['jour'] ?></td>
            <td><?= $reponse['credit'] ?></td>
            <td><?= $reponse['titre'] ?></td>
            <td><?= $reponse['lastLogin'] ?></td>
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
          </div>
          </div>
        </div>
    </aside>
</div>
</div>
