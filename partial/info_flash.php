<?php


if (isset($message))
   {
      switch ($message) 
      {
         case 'envoie': 
            $errmsg = '<p>votre demande à ete envoie :<br> Elle sera ajouter a votre liste lors de votre prochien connection : </p><a href="profil.php"><button type="button" class="btn btn-primary">Retour</button></a>';
            break;
        default :
            $errmsg = 'rien de rien';
            break;
      }
   }

   if(isset($errmsg)){
   	echo $errmsg;
   }
   