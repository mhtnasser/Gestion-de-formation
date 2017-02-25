<?php 

    include('../modele/admin_modele.php');
    $my = new ManagerAdmin();

	if(isset($_GET['accepte']))
	{
		$m = $my->payement($_GET['accepte']);

	    if ($m['jour'] > $m['dure'] && $m['credit'] > $m['prix']) 
	    {
			$jour = $m['jour'] - $m['dure'];
			$credit = $m['credit'] - $m['prix'];

		    $my->debite($m['id'], $jour, $credit);
		    $my->accepte($_GET['accepte']);
		    header('location: ../admin_manager.php?msg=succes');
	    }
	    else
	    {
	        header('location: ../admin_manager.php?msg=cannot');
	    }
	}

	if(isset($_GET['refuse']))
	{	 
	    $my->refuse($_GET['refuse']);	
		header('location: ../admin_manager.php');
	}