<?php

$subActions = ["walk", "heal", "escort", "vendor"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "walk") {
    $msgBox = movement($turnNum, $subFullName, $subX, $subY, $subZ, 3, $subMove);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "heal") {
    $objRating += $subHeal;
    $subScore += 5;
    echo $turnNum." : ".$subFullName.' '.$spacedictus[$proLingo]["heal"].' ('.$subHeal.') '.$objFullName."<br>";
} elseif ($subAction == "escort") {
    $msgBox = synchrone($turnNum, $subFullName, $subX, $subY, $subZ, $objFullName, $objX, $objY, $objZ, 3, $subMove);
    $subX = $msgBox['i']['x'];
    $subY = $msgBox['i']['y'];
    $subZ = $msgBox['i']['z'];
    $objX = $msgBox['j']['x'];
    $objY = $msgBox['j']['y'];
    $objZ = $msgBox['j']['z'];
    $subScore += 5;
} elseif ($subAction == "vendor") {
    $msgBox = initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, ratioCalc($proEconVal, $subEconVal), $proUseWeapon);
    $proMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
}
