<?php

if(!isset($_SESSION['id']) AND !isset($_SESSION['pseudo'])){
	header('location: home');
	exit();
}
?>