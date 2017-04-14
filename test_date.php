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
   $nb1 = 0;
   $nb2 = 2;

	$bdd = new Base();
	$bdd = $bdd->connexion();

	$count = $bdd->query("Call count_formation()");
	var_dump($count->fetchAll());

	$count->closeCursor();

	$rep = $bdd->prepare("Call proc(:nb1, :nb2)");
	$rep->setFetchMode(PDO::FETCH_ASSOC);
	$rep->bindParam(":nb1", $nb1); 
	$rep->bindParam(":nb2", $nb2);
	$rep->execute();


	  
	$out = $rep->fetchAll();    // on recupere l'unique ligne de resultat  
	var_dump($out);




/*


$stmt = odbc_prepare($bdd, 'CALL proc(?,?)');
$res  = odbc_execute($stmt, array($nb1, $nb2));

*/
















