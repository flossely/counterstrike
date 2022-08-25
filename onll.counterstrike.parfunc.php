<?php

$subActions = ["walk", "escort"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "walk") {
    $msgBox = movement($turnNum, $subFullName, $subX, $subY, $subZ, 3, $subMove);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "escort") {
    $msgBox = synchrone($turnNum, $subFullName, $subX, $subY, $subZ, $objFullName, $objX, $objY, $objZ, 3, $subMove);
    $subX = $msgBox['i']['x'];
    $subY = $msgBox['i']['y'];
    $subZ = $msgBox['i']['z'];
    $objX = $msgBox['j']['x'];
    $objY = $msgBox['j']['y'];
    $objZ = $msgBox['j']['z'];
    $subScore += 5;
    $objScore += 5;
}
