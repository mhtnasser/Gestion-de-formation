<?php 
 session_start();
 
  include('filtre/cour_filter.php');
  include('filtre/auth_filter.php');
  include('partial/header.php');
  include('views/cour_views.php');
  include('partial/footer.php');
   