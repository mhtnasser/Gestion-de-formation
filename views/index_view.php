<section>
  	
  <form method="post" action="controleur/login.php">
    		
  	<div class="vid-container">
      <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
        <source src="http://mazwai.com/system/posts/videos/000/000/221/original/discovery_part_II-jonathan_mitchell.mp4?1461020357" type="video/mp4">
    </video>

    <div class="inner-container">
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
          <input type="text" name="username" id="user" placeholder="Entrez votre Nom" value="<?php if(isset($_COOKIE['name_save'])){
            echo $_COOKIE['name_save'];
            } ?>">
          <input type="password" name="password" placeholder="Entrez Votre mot de passe" value="<?php if(isset($_COOKIE['password_save'])){
              echo $_COOKIE['password_save'];
              } ?>">
          <button type="submit" name="submit" >LOGIN</button>
          <div class="login-admin">
            Vous été admin :
            <span><a href="home/admin"> Login </a></span>
          </div>
      </div>
    </div>
  </div>
  	
  </form>
  
</section>


 