<?php
class Base {

	

	public function connexion() {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=gestionclub;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		return $bdd;
	}
}


/*
//la date d’aujourd’hui au format Jour-Mois-Année
$dateDuJour = date('d-m-Y');

art('o)
var_dump($dateDuJour);
//Conversion en objet Datetime
$date = \DateTime::createFromFormat('d-m-Y', $dateDuJour);

var_dump($date);


$i = new DateInterval('P3M');
$i = DateInterval::createFromDateString('1 months');

var_dump($i);

$date->add($i);


var_dump( $date->format('Y-m-d H:m:s'));*/

//recupere la liste de tout les formation.
    function listeFormation()
    {
    	$bdd = new Base();
    	$bdd = $bdd->connexion();

    	$req = $bdd->query('SELECT moment From evenements');

        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
    	
        return $donnees;
    }

var_dump( listeFormation()); die();


















