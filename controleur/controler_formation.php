<?php 
session_start();
if(isset($_GET['Demande']))
{
	include('../modele/inset_modele.php');
	include('../modele/emploie.php');

	$my = new insertFormation();

	$m = $my->setformation($_SESSION['id'], $_GET['Demande']);

	$_SESSION['ma_formation'] = getEmploie($_SESSION['id']);

    header('location: ../formation.php?formation='.$_GET['Demande'].'&msg='.$m);
}