<?php

$subActions = ["weapon", "melee", "shield"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "weapon") {
    $msgBox = initExchange($thisParadigm, $yearToday, $obj, $sub, $objUseWeapon, $zoneArr);
    $objMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
} elseif ($subAction == "melee") {
    $msgBox = initExchange($thisParadigm, $yearToday, $obj, $sub, $objUseMelee, $zoneArr);
    $objMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
} elseif ($subAction == "shield") {
    $msgBox = initExchange($thisParadigm, $yearToday, $obj, $sub, $objUseShield, $zoneArr);
    $objMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
}
