<?php
require_once 'CalculDistanceImpl.php';


$classCalc = new CalculDistanceImpl();

$parcours = [
    ['latitude' => 47.646870, 'longitude' => -2.778911],
    ['latitude' => 47.646197, 'longitude' => -2.780220],
    ['latitude' => 47.646197, 'longitude' => -2.780220],
    ['latitude' => 47.646992, 'longitude' => -2.781068],
    
];

$distTotale = $classCalc->calculDistanceTrajet($parcours);
echo $distTotale;
?>