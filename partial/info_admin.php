<?php


if (isset($message))
   {
      switch ($message) 
      {
         case 'succes': 
            $errmsg = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       Demande Accepte avez succes ! <br> Le table vas se mettre a jour lors de votre prochaint connexion <span aria-hidden="true">&times;</span>
                       </button>';
            break;
         case 'cannot': 
         $errmsg = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    Error : Le jour ou credit de l\'emploie est inssufusent <span aria-hidden="true">&times;</span>
                    </button>';
         break;
        default :
            $errmsg = 'rien de rien';
            break;
      }
   }

   if(isset($errmsg)){
   	echo $errmsg;
   }
   