<?php

$subActions = ["close", "take", "vendor", "withdraw"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "close") {
    $subX = $objX;
    $subY = $objY;
    $subZ = $objZ;
    $subScore += 10;
    echo $turnNum . " : " . $subFullNotation . ' '. $spacedictus[$proLingo]["tract"] . ' ' . $objFullNotation . "<br>";
} elseif ($subAction == "take") {
    $msgBox = synchrone($turnNum, $subNotation, $subX, $subY, $subZ, $objNotation, $objX, $objY, $objZ, 3, $subMove);
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
} elseif ($subAction == "withdraw") {
    $msgBox = initExchange($thisParadigm, $yearToday, $sub, '.', $subMoney, $proMoney, ratioCalc($subEconVal, $proEconVal), $subUseWeapon);
    $subMoney = $msgBox['debit'];
    $proMoney = $msgBox['credit'];
}
