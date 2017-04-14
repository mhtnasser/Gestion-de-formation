<?php
$header="MIME-Version: 1.0\r\n";
         $header.='From:"M2L.com"<support@M2L.com>'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - M2L.com</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     A bientôt sur <a href="http://127.0.0.1/Emploie/index.php">M2L.com</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
?>