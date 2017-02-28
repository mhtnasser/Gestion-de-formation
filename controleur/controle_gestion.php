<?php 
session_start();
    include('../modele/admin_modele.php');
    $my = new ManagerAdmin();
    if(isset($_GET['id']))
    {

		if(isset($_GET['accepte']))
		{
			$m = $my->payement($_GET['accepte']);

		    if ($m['jour'] > $m['dure'] && $m['credit'] > $m['prix']) 
		    {
				$jour = $m['jour'] - $m['dure'];
				$credit = $m['credit'] - $m['prix'];

			    $my->debite($m['id'], $jour, $credit);
			    $my->accepte($_GET['accepte']);
			    $_SESSION['MFormation'] = $my->getFormations($_GET['id']);
			    //var_dump($_SESSION['MFormation']); die();
			    header('location: ../admin_manager.php?msg=succes&id='.$_GET['id'].'');
		    }
		    else
		    {
		        header('location: ../admin_manager.php?msg=cannot&id='.$_GET['id'].'');
		    }
		}

		if(isset($_GET['refuse']))
		{	 
			//var_dump($_SESSION['MFormation']);
		    $my->refuse($_GET['refuse']);
		    $m = $_SESSION['MFormation'] = $my->getFormations($_GET['id']);	
		    //var_dump($m); die();
			header("location: ../admin_manager.php?id=".$_GET['id']);
		}
    }