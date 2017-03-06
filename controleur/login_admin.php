<?php
session_start();
//on se connecte
include('../modele/admin_modele.php');

//recupere le variable
if(isset($_POST['nom_admin']) AND isset($_POST['mdp_admin']))
{
		
	$nom_admin = $_POST['nom_admin'];
	$mdp_admin = $_POST['mdp_admin'];

		if(empty($nom_admin) AND empty($mdp_admin))
		{
		    header('Location: ../home/admin/notset');
		}
		else
		{
		    $admin_Majuscule = strtoupper($nom_admin);
		    $mdp_Majuscule = strtoupper($mdp_admin);
		    $mdp_sha = sha1($mdp_Majuscule);
            
            $my = new ManagerAdmin();
		    $resultat = $my->findAdmin($admin_Majuscule, $mdp_sha);
       
			    if(!$resultat)
			    {
			    	header('Location: ../home/admin/inconnu');	
			    }else
			    {
			    	$_SESSION['id_admin'] = $resultat['id'];
			    	
					//redirection vers sons profil
					header('Location: controle_admin.php');
			    }
		}
}

