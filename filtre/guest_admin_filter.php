<?php

if(isset($_SESSION['id_admin']) AND isset($_SESSION['nom_admin'])){
	header('location: index_admin.php');
	exit();
}
?>