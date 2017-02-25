<?php
include('data_base/data_base.php');
class MesCour
{
	//recupere le formation liste de formation d'un emploie.
	public function getcour($get)
	{
		 $bdd = new Base();
		 $bdd = $bdd->connexion();
         
         $req = $bdd->prepare('SELECT a.status, a.id_emploie, a.id_formation, a.date_act, f.nom_formation, f.contenu, f.la_date FROM for_active a INNER JOIN formation f ON a.id_formation=f.id WhERE a.id=:id');
		$req->execute(array(
		    ':id' => $get));

		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		 return $resultat;
	}
}
