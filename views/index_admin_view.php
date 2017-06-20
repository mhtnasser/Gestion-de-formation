<div id="body-container">
  <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?1410742112" type="video/webm">
      
  </video>
  <div id="login-button">
    <img class="zone-img" src="http://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
    </img>
  </div>
  <div id="container">
    <h1 class="zone-title">Login</h1>
    <span class="close-btn">
      <img class="zone-img"></img>
    </span>

    <form method="post" action="controleur/login_admin.php">
      <input class="zone-champ-text" type="text" name="nom_admin" placeholder="Name">
      <input class="zone-champ-text" type="password" name="mdp_admin" placeholder="Password">
      <button class="zone-champ-text" type="submit">Log in</button>
      <div id="remember-container">
        
        <span id="remember">Vous été Emploie :</span>
        <a href="index.php" id="forgotten">Login</a>
      </div>
  </form>
  </div>
</div>
<?php include('./partial/errors.php'); ?>
  <?php
    //affiche les erreurs si nom et le mot de passe sont incorrecte.
       if (isset($errmsg)) 
       { 
          echo '<div class="msg-warging-admin">' . $errmsg . '</div>'; 
       }
  ?>

<script>
      $('#login-button').click(function(){
      $('#login-button').fadeOut("slow",function(){
          $("#container").fadeIn();
            //TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
            //TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
      });
    });
</script>