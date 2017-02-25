<?php 

include('../data_base/data_base.php');


    // recupere le information sur un emploie selon son id
	function getEmploie($id)
	{
		$bdd = new Base();
		$bdd = $bdd->connexion();
		
		$req = $bdd->prepare('SELECT e.nom AS nom_emploie, e.prenom AS prenom_emploie, e.jour AS jour, e.credit AS credit, s.titre AS titre FROM emploie AS e INNER JOIN service AS s ON e.id_service = s.id WHERE e.id = :id_emploie');
		$req->execute(array(
		    'id_emploie' => $id));

		$resultat = $req->fetch(PDO::FETCH_ASSOC);
		return $resultat;
	}
    
    //recupere la l'id de l'emploie selon sont nom et son mdp.
    function findUser($pseudo, $pass)
    {
      $bdd = new base();
      $bdd = $bdd->connexion();
      
      $req = $bdd->prepare('SELECT id FROM emploie WHERE nom = :pseudo AND mdp = :pass');
		    $req->execute(
		    	array(
		        ':pseudo' => $pseudo,
		        ':pass' => $pass));
           
		    return $resultat = $req->fetch();
    }
    
    //recupere la liste de tout les formation.
    function listeFormation()
    {
    	$bdd = new Base();
    	$bdd = $bdd->connexion();

    	$req = $bdd->query('SELECT id AS id_formation, nom_formation, contenu, dure AS dure_formation, la_date AS date_formation, lieux, pre_requis, prix AS prix_formation FROM formation ORDER BY id');

        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
    	
        return $donnees;
    }

    //recupere la liste de formation d'un emploie
    function getFormation($id)
	{
		$bdd = new Base();
		$bdd = $bdd->connexion();
		
		$req = $bdd->prepare('SELECT a.id_formation AS id_forme, e.nom AS nom_p, a.id AS id_active, f.nom_formation AS nom_f, a.status AS statuts_a, a.date_act AS date_actuelle FROM emploie AS e INNER JOIN for_active AS a ON e.id = a.id_emploie INNER JOIN formation AS f ON a.id_formation = f.id WHERE a.id_emploie = :id');
		$req->execute(array(
		    ':id' => $id));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
	}




