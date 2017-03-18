<?php
session_start();
//on se connecte
include('../modele/emploie.php');

//recupere le variable
if(isset($_POST['username']) AND isset($_POST['password'])){
		
	$user = $_POST['username'];
	$pass = $_POST['password'];

		if(empty($user) AND empty($pass)){
		    header('Location: ../home/notset');
		    //index.php?error=notset
		}
		else{
		    $user_Majuscule = strtoupper($user);
		    $pass_Majuscule = strtoupper($pass);
		    $pass_sha = sha1($pass_Majuscule);


		    //Vérification de indentifiants
		   /* $req = $bdd->prepare('SELECT id FROM emploie WHERE nom = :pseudo AND mdp = :pass');
		    $req->execute(
		    	array(
		        'pseudo' => $user_Majuscule,
		        'pass' => $pass_sha));*/
           
	        $resultat = findUser($user_Majuscule, $pass_sha);
   
		    if(!$resultat){
		    	header('Location: ../home/inconnu');	
		    	//index.php?error=inconnu
		    }else{
		    	
		    	$_SESSION['id'] = $resultat['id'];
		    	$_SESSION['pseudo'] = $user_Majuscule;
		    	
				//redirection vers sons profil
				header('Location: controle_profil.php');

				setcookie("name_save", $user, (time() + 3600), '/');  /* expire dans 1 heure */
		    	setcookie("password_save", $pass, (time() + 3600), '/');  /* expire dans 1 heure */
		    }

		}
}

