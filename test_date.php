<?php

//la date d’aujourd’hui au format Jour-Mois-Année
$dateDuJour = date('d-m-Y');

var_dump($dateDuJour);
//Conversion en objet Datetime
$date = \DateTime::createFromFormat('d-m-Y', $dateDuJour);

var_dump($date);


$i = new DateInterval('P3M');
$i = DateInterval::createFromDateString('1 months');

var_dump($i);

$date->add($i);


var_dump( $date->format('Y-m-d H:m:s'));