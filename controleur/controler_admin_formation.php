<?php 
session_start();
if(htmlspecialchars($_GET['emploie'])){
	include('../modele/emploie.php');
    
     $_SESSION['MEmploie'] = getEmploie(htmlspecialchars($_GET['emploie']));
     $_SESSION['MFormation'] = getFormation(htmlspecialchars($_GET['emploie']));
    
     header('location: ../admin_manager.php');
}
