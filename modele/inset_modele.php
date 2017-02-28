<?php

include('../data_base/data_base.php');
class insertFormation
{
	//on insert une demande dans la base de donne
	public function setformation($emploie, $formation)
	{
		$bdd = new Base();
		$bdd = $bdd->connexion();
        
		//la date d’aujourd’hui au format Jour-Mois-Année
		$dateDuJour = date('d-m-Y');

		//Conversion en objet Datetime
		$date = \DateTime::createFromFormat('d-m-Y', $dateDuJour);

		//crée un objet date interval pour ajoute 1 mois
		$i = new DateInterval('P3M');
		$i = DateInterval::createFromDateString('1 months');

		//on ajouter a l'objet date Time l'objet date Interval 
		$date->add($i);
		$date_expire = $date->format('Y-m-d H:m:s');

        $req = $bdd->prepare("INSERT INTO for_active (date_act, status, id_emploie, id_formation) VALUES(:date_expire, 0, :emploie, :formation)");
		$req->execute(array(
		    ':emploie' => $emploie,
		    ':formation' => $formation,
            ':date_expire' =>$date_expire
		));
		return "envoie";
	}

	public  function getFormation($id)
	{
		$bdd = new Base();
		$bdd = $bdd->connexion();
		
		$req = $bdd->prepare('SELECT a.id_formation AS id_forme, e.nom AS nom_p, a.id AS id_active, f.nom_formation AS nom_f, a.status AS statuts_a, a.date_act AS date_actuelle FROM emploie AS e INNER JOIN for_active AS a ON e.id = a.id_emploie INNER JOIN formation AS f ON a.id_formation = f.id WHERE a.id_emploie = :id');
		$req->execute(array(
		    ':id' => $id));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
	}
}