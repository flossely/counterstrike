<?php

$subActions = ["walk", "strike", "defend"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "walk") {
    $msgBox = movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "strike") {
    $objRating -= $subForce + $objShield;
    $subRating += $subForce - $objShield;
    $subScore += 10;
    echo $turnNum." : ".$subHalfNotation.' '.$subForceType." (".$subForce."/".$objShield.") ".$objHalfNotation."<br>";
} elseif ($subAction == "defend") {
    $subRating -= $objForce + $subShield;
    $objRating += $objForce - $subShield;
    $objScore += 5;
    echo $turnNum." : ".$objHalfNotation.' '.$objForceType." (".$objForce."/".$subShield.") ".$subHalfNotation."<br>";
}
