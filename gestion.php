<?php
session_start();

include('filtre/auth_admin_filter.php');
require('partial/header.php');
require('views/gestion_demande.php');
require('partial/footer.php');
