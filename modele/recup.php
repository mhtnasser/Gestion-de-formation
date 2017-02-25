<?php
/**
 * Created by PhpStorm.
 * User: nasri
 * Date: 02/01/2017
 * Time: 14:57
 */
    include('../data_base/data_base.php');

        $bdd = new Base();
        $bdd = $bdd->connexion();

        $req = $bdd->query("SELECT id, nom_formation, dure, la_date, lieux, pre_requis, prix FROM formation Where nom_formation LIKE '%".$_GET['formation']."%'");


        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        var_dump($resultat,  $_GET['formation']);


