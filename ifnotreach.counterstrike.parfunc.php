<?php

$subActions = ["walk"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "walk") {
    echo movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
}
