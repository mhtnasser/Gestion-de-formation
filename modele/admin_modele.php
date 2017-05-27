<?php

include('../data_base/data_base.php');

class ManagerAdmin {

	private $_bdd;

	public function ManagerAdmin()
	{
		$bdd = new base();
		$this->_bdd = $bdd->connexion();
	}

	public function findAdmin($nom, $pass)
	{   
	   $req = $this->_bdd->prepare('SELECT id FROM admin WHERE nom = :nom AND mdp = :pass');
		    $req->execute(
		    	array(
		        ':nom' => $nom,
		        ':pass' => $pass));
	           
		return $resultat = $req->fetch();
	}

	public function getAdmin($id)
	{
		$req = $this->_bdd->prepare('SELECT a.nom AS nom_admin, a.prenom AS prenom_admin, s.titre AS titre_admin FROM admin AS a INNER JOIN service AS s ON a.id_service = s.id WHERE a.id = :id_admin');
		$req->execute(array(
		    ':id_admin' => $id));

		$resultat = $req->fetch(PDO::FETCH_ASSOC);
		return $resultat;
	}

	public function MesEmploie($service)
	{
		$req = $this->_bdd->prepare('SELECT e.id AS id_emploie, e.nom AS nom_emploie, e.prenom AS prenom_emploie FROM emploie AS e INNER JOIN service AS s on e.id_service=s.id WHERE s.titre = :service');
		$req->execute(array(
		    ':service' => $service));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
	}

	public function refuse($id)
	{
		$req = $this->_bdd->prepare('UPDATE for_active SET status=2 WHERE id = :id');
		$req->execute(array(
		    ':id' => $id));

		 return $req->rowCount();
	}

	public function payement($id)
	{
			$req = $this->_bdd->prepare('SELECT e.id, e.jour, e.credit, f.dure, f.prix FROM emploie AS e INNER JOIN for_active AS a ON e.id=a.id_emploie INNER JOIN formation AS f ON f.id=a.id_formation WHERE a.id=:id');
		$req->execute(array(
		    ':id' => $id));

		$resultat = $req->fetch(PDO::FETCH_ASSOC);
		return $resultat;
	}
    
     public function debite($id, $jour, $credit)
	{
		$req = $this->_bdd->prepare('UPDATE emploie SET jour = :jour, credit = :credit WHERE id = :id');
		$req->execute(array(
		    ':id' => $id,
            ':jour' => $jour,
            ':credit' => $credit 
		    ));

		 return $req->rowCount();
	}

	public function accepte($id)
	{
		//la date d’aujourd’hui au format Jour-Mois-Année
		$dateDuJour = date('d-m-Y');

		//Conversion en objet Datetime
		$date = \DateTime::createFromFormat('d-m-Y', $dateDuJour);

		//crée un objet date interval pour ajoute 1 mois
		$i = new DateInterval('P3M');
		$i = DateInterval::createFromDateString('1 months');

		//on ajouter a l'objet date Time l'objet date Interval 
		$date->add($i);
		$date_fin = $date->format('Y-m-d H:m:s');

		$req = $this->_bdd->prepare('UPDATE for_active SET status = 1, date_act = :date_fin WHERE id = :id');
		$req->execute(array(
			':date_fin' => $date_fin,
		    ':id' => $id));

		 return $req->rowCount();
	}

	public function getFormations($id)
	{	
		$req = $this->_bdd->prepare('SELECT a.id_formation AS id_forme, e.nom AS nom_p, a.id AS id_active, f.nom_formation AS nom_f, a.status AS statuts_a, a.date_act AS date_actuelle FROM emploie AS e INNER JOIN for_active AS a ON e.id = a.id_emploie INNER JOIN formation AS f ON a.id_formation = f.id WHERE a.id_emploie = :id');
		$req->execute(array(
		    ':id' => $id));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
	}
}
