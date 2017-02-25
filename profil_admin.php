<?php
session_start();

include('filtre/auth_admin_filter.php');
require('partial/header.php');
require('views/profil_admin_view.php');
require('partial/footer.php');
