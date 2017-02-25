<?php
include('data_base/data_base.php');
class MesFormation
{
	//on recupere une seul formation
	public function getFormation($get)
	{
		 $bdd = new Base();
		 $bdd = $bdd->connexion();
         
         $req = $bdd->prepare('SELECT id, nom_formation, dure, la_date, lieux, pre_requis, prix FROM formation Where id = :id');
		$req->execute(array(
		    ':id' => $get));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $resultat;
	}


    public function MaListe()
	{
		 $bdd = new Base();
		 $bdd = $bdd->connexion();
         
         $req = $bdd->prepare("SELECT id AS id_formation, nom_formation, contenu, dure AS dure_formation, la_date AS date_formation, lieux, pre_requis, prix FROM formation WHERE prix < ':prix'");
		$req->execute(array(
		    ':prix' => (int)$_SESSION['credit']));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $resultat;
	}

	
	
}




