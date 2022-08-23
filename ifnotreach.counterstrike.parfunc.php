<?php

$subActions = ["walk"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "walk") {
    $msgBox = movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
}
