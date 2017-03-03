<section>
  	
  <form method="post" action="controleur/login.php">
    		
    	<div class="vid-container">
        <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
          <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
        </video>

        <div class="inner-container">
          <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
            <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
          </video>
            <div class="box">
            <div class="logo">
              <img src="img/profile_banner_1.png" alt="" >
            </div>
              <?php include('./partial/errors.php'); ?>
              <?php
              //affiche les erreurs si nom et le mot de passe sont incorrecte.
                 if (isset($errmsg)) 
                 { 
                    echo '<div class="msg-warging">' . $errmsg . '</div>'; 
                 }
              ?>
              <input type="text" name="username" id="user" placeholder="Entrez votre Nom">
              <input type="password" name="password" placeholder="Entrez Votre mot de passe">
              <button type="submit" name="submit" >LOGIN</button>
              <div class="login-admin">Vous été admin :<span><a href="index_admin.php"> Login </a></span></div>
            </div>
        </div>
    </div>
  	
  </form>
  
</section>


 