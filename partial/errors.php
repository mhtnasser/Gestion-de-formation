<?php

if (isset($_GET['error']))
   {
      switch ($_GET['error']) 
      {
         case 'inconnu': 
            $errmsg = 'Mauvais identifiant ou mot de passe !';
            break;
         case 'notset':
            $errmsg = 'Veuillez remplire touts les champs !';
            break;
      }
   }