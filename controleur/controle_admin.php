<?php
session_start();

include('../modele/admin_modele.php');

$my = new ManagerAdmin();

$resultat = $my->getAdmin($_SESSION['id_admin']);

$_SESSION['GetAdmin'] = $resultat;
$_SESSION['MesEmploie'] = $my->MesEmploie($resultat['titre_admin']);




header('location: ../profil_admin.php');
//profil_admin.php