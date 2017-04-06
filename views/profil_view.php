  <header class="profile-header">
    <figure class="profile-banner">
      <img src="img/Profile.jpg" alt="Profile banner" />
    </figure>

    <figure class="profile-picture">
      <?= '<img src="img/Profil/'.$_SESSION['id'].'.png">' ?>
    </figure>

      <div class="profile-stats">
        <ul>
              <li><?= $_SESSION['titre']  ?>    <span>Service</span></li>
              <li><?= $_SESSION['credit'] ?>    <span>Credit</span></li>
              <li><?= $_SESSION['jour']   ?>    <span>Jour(s) Disponible</span></li>
              <li>
                  <form>
                  <input type="text" id="entre" onkeyup="showHint(this.value)">
                  </form>
              </li>
        </ul>
        <!--<a href="listeformation.php"><button type="button" class="btn-success">ma Liste</button></a>-->
        <a href="controleur/logout.php">
          <button type="button" class="btn btn-warning">Deconnexion</button> 
        </a>

      </div>
      <h1 class="profile-name"><?= $_SESSION['nom'] ?> <small class="profile-first_name"><?= $_SESSION['prenom'] ?></small></h1>
  </header>

  <section>
  <div class="container">
  <div class="row">
    
  <!--table de tout les formation a la quel un emploie est inscript -->
<div class="col-md-8">
<h3 class="title-main-form">Toutes les formations de <?= $_SESSION['nom'] ?></h3>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Formations</th>
        <th>Statuts</th>
        <th>Envoié le</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($_SESSION['ma_formation'] as $donne) : ?>
        <tr>
        <td><?= $donne['nom_p']?></td>
        <td><?= $donne['nom_f'] ?></td>
      <?php 
        switch ($donne['statuts_a'])
        {
          case 0:
            echo "<td>En Attente</td>";
            break;
          case 1:
            echo "<td> ".'<a href="cour/'.$donne['id_active'].'"><button type="button" class="btn btn-primary">Valide</button></a>'."</td>";
            break;
          case 2:
            echo "<td>Refuse</td>";
            break;
          case 3:
            echo "<td>Effectué</td>";
            break;
          default:
            echo "error";
            break;
        }
      ?>
        <td><?= $donne['date_actuelle'] ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
  <!-- END table de tout les formation a la quel un emploie est inscrit -->
  <!-- ESPACE PUB -->
  <div class="pub col-md-4">
    <img src="img/pub.png" alt="IP-Formation" class="box-img">
  </div>
  <!-- END ESPACE PUB -->
  <!--table de tout les formation -->
<div class="col-md-12">
<div class="row table-content-form">
        
       <?php
              $reponse = $_SESSION['listeFormation'];
              $i = 0;
              $lien = '';
              $id = '';
                //boucle pour affiche tout les formations
                foreach ($reponse as $formation) 
                {
                  echo  '<div class="table-info-form col-md-4 col-sm-5">';
                  echo  '<div class="item-logo"> <img src="img/'.$formation['id_formation'].'.png" sizes="(max-width: 150px) 100vw, 150px"/></div>'.
                        '<div class="item-forms form-nom"> '.$formation['nom_formation'] .'</div>'.
                        '<div class="item-form" >'          .$formation['dure_formation'].'</div>'.
                        '<div class="item-form" ><i class="fa fa-calendar" aria-hidden="true"></i>'          .$formation['date_formation'].'</div>'.
                        '<div class="item-form" ><i class="fa fa-map-marker" aria-hidden="true"></i>'          .$formation['lieux']         .'</div>'.
                        '<div class="item-form" ><i class="fa fa-book" aria-hidden="true"></i>'          .$formation['pre_requis']    .'</div>'.
                        '<div class="item-form" >'          .$formation['prix_formation'].'</div>';
                        //boucle pour enleve le boutton demande pour les formation a la quel on ne deja inscript
                        foreach ($_SESSION['ma_formation'] as $donne)
                        {
                          if($donne['id_forme'] == $formation['id_formation']) 
                          {
                            $i = 1;
                          }
                          
                        }

                        if($i == 1)
                        {
                          echo '<div class="item-form-valide"><p>Deja inscrit</p></div>';
                        }else  {
                          echo '<div class="item-form-demande"> '.'<a href="formation/'.$formation['id_formation'].'"><button type="button" class="btn btn-success">Demande</button></a>'."</div>";
                        }

                  $i=0;
                  echo "</div>";               
                }
      ?>  
</div>
</div>
</div>
  </div>
</section>




  