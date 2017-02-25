<?php
class Base {

	

	public function connexion() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=m2l;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		return $bdd;
	}
}
