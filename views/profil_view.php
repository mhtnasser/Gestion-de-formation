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
                  <!--<input type="text" id="entre" placeholder="Rechercher..." style=" color: #333;" onkeyup="showHint(this.value)">-->
                  <input type="text" ng-model="query" style=" color: #333;"/>
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
 <!-- angular js -->
<?php $json = file_get_contents('json/formation.json'); ?>
    <ul ng-init="names = <?php echo htmlspecialchars($json); ?>" ng-show="query">
      <li class="earch_item" ng-repeat="x in names | filter:{nom_formation:query}">
        <div class="bg-info"> <p class="text-muted">
<a href="formation/{{x.id_formation}}"><button type="button" class="hiden-btn btn btn-success">Demande</button></a>
  <strong> Nom : </strong> {{x.nom_formation}}
  <strong> Dure : </strong>{{x.dure_formation}}
  <strong> Prix : </strong>{{x.prix_formation}}
  <strong> Lieux : </strong>   {{x.lieux}}
  <strong> Pre-requis : </strong>{{x.pre_requis}}</p></div>

      </li>
    </ul>
 <!-- end angular js -->

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
/* Debut Pagination */
  include('data_base/data_base.php');
  $bdd = new Base();
  $bdd = $bdd->connexion();
  
  $formParPage = 6;
  $count = $bdd->query("Call count_formation()");
  $formTotales = $count->rowCount();
  $count->closeCursor();
  $pagesTotales = ceil(intval($formTotales)/$formParPage);
  if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales)
  {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
  }else{
    $pageCourante = 1;
  }

  $depart = ($pageCourante-1)*$formParPage;

  $rep = $bdd->prepare("Call proc(:nb1, :nb2)");
  $rep->setFetchMode(PDO::FETCH_ASSOC);
  $rep->bindParam(":nb1", $depart); 
  $rep->bindParam(":nb2", $formParPage);
  $rep->execute();


    
  $reponse = $rep->fetchAll(); 
/* Fin Pagination*/

  $i = 0;
  $lien = '';
  $id = '';
    //boucle pour affiche tout les formations
    foreach ($reponse as $formation) 
    {
      echo  '<div class="table-info-form col-md-4 col-sm-5">';
      echo  '<div class="item-logo"> <img src="img/'.$formation['id_formation'].'.png" sizes="(max-width: 150px) 100vw, 150px"/></div>'.   '<div class="item-forms form-nom"> '.$formation['nom_formation'] .'</div>'.
            '<div class="item-form" >'.$formation['dure_formation'].'</div>'.
            '<div class="item-form" ><i class="fa fa-calendar" aria-hidden="true"></i>'.$formation['date_formation'].'</div>'.
            '<div class="item-form" ><i class="fa fa-map-marker" aria-hidden="true"></i>'.$formation['lieux']         .'</div>'.
            '<div class="item-form" ><i class="fa fa-book" aria-hidden="true"></i>'.$formation['pre_requis']    .'</div>'.
            '<div class="item-form" >'.$formation['prix_formation'].'</div>';
            
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
<ul class="pagination pagination-lg">
<?php
    for($i=1; $i<=$pagesTotales; $i++) {
         if($i == $pageCourante) {
            echo '<li class="disabled"><a>'.$i.'</a></li> ';
         } else {
            echo '<li><a href="profil/'.$i.'">'.$i.'</a></li> ';
         }
      }

?>
</ul>
</div>
</div>
  </div>
</section>




  