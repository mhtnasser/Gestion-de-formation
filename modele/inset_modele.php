<?php

include('../data_base/data_base.php');
class insertFormation
{
	//on insert une demande dans la base de donne
	public function setformation($emploie, $formation)
	{
		$bdd = new Base();
		 $bdd = $bdd->connexion();
        

         $date_craete = time() + (30 * 24 * 60 * 60);

         $date_expire = date('Y-m-d H:m:s', $date_create);


         $req = $bdd->prepare("INSERT INTO for_active (date_act, status, id_emploie, id_formation) VALUES(:date_expire, 0, :emploie, :formation)");
		$req->execute(array(
		    ':emploie' => $emploie,
		    ':formation' => $formation,
            ':date_expire' =>$date_expire
		));
		return "envoie";
	}

	public function info()
	{
		return "vous etez sur la class mes formation";
	}
}