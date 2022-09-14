<?php
require_once 'CalculDistanceImpl.php';


$classCalc = new CalculDistanceImpl();

$etap1 = $classCalc->calculDistance2PointsGPS(47.644795,-2.776605,47.646870,-2.778911);
$etap2 = $classCalc->calculDistance2PointsGPS(47.646870,-2.778911,47.646197,-2.780220);
$etap3 = $classCalc->calculDistance2PointsGPS(47.646197,-2.780220,47.646992,-2.781068);
$etap4 = $classCalc->calculDistance2PointsGPS(47.646992,-2.781068,47.647867,-2.781744);
$etap5 = $classCalc->calculDistance2PointsGPS(47.647867,-2.781744,47.648510,-2.780145);

$parcours = array($etap1,$etap2,$etap3,$etap4,$etap5);

$distTotale = $classCalc->calculDistanceTrajet($parcours);
//echo $distTotale;
?>