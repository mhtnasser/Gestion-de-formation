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
              <li><?= $_SESSION['jour']   ?>    <span>Jour Disponible</span></li>
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
  <div class="row">
    <div class="container">
        <p>REPONSE : <span id="txtHint"></span></p>
    <!--table de tout les formation -->
<div class="col-md-6">
<table class="table table-hover">
        
        <thead>
         <tr>
           <th>Formation</th>
           <th>Dure</th>
           <th>Date debut</th>
           <th>Lieux</th>
           <th>Pre-requis</th>
           <th>prix</th>
           <th>Demande</th>
         </tr>
        </thead>

<tbody>
       <?php
              $reponse = $_SESSION['listeFormation'];
              $i = 0;
              $lien = '';
              $id = '';
                //boucle pour affiche tout les formations
                foreach ($reponse as $formation) 
                {
                  echo  "<tr>";
                  echo  "<td> ".$formation['nom_formation']."</td>".
                        "<td> ".$formation['dure_formation']."</td>".
                        "<td> ".$formation['date_formation']."</td>".
                        "<td> ".$formation['lieux']."</td>".
                        "<td> ".$formation['pre_requis']."</td>".
                        "<td> ".$formation['prix_formation']."</td>";
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
                          echo "<td><p>Deja inscrit</p></td>";
                        }else  {
                          echo "<td> ".'<a href="formation/'.$formation['id_formation'].'"><button type="button" class="btn btn-success">Demande</button></a>'."</td>";
                        }

                  $i=0;
                  echo "</tr>";               
                }
      ?>  
</tbody>
</table>
</div>
<!--table de tout les formation a la quel un emploie est inscrit -->
    <div class="col-md-6">
    <table class="table table-hover">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Formation</th>
              <th>Statut</th>
              <th>Envoie le</th>
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
                  echo "<td>Effectuer</td>";
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
    </div>
  </div>
</section>




  