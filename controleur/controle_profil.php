<?php
session_start();
include('../modele/emploie.php');

$id = $_SESSION['id'];
$donnees = getEmploie($id);
$listeFormation = listeFormation();

$ma_formation = getFormation($id);

$_SESSION['nom'] = $donnees['nom_emploie'];
$_SESSION['prenom'] = $donnees['prenom_emploie'];
$_SESSION['jour'] = $donnees['jour'];
$_SESSION['credit'] = $donnees['credit'];
$_SESSION['titre'] = $donnees['titre'];
$_SESSION['listeFormation'] = $listeFormation;
$_SESSION['ma_formation'] = $ma_formation;

header('location: ../profil');