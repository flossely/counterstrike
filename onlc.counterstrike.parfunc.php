<?php

$subActions = ["weapon", "melee", "shield"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "weapon") {
    $msgBox = initExchange($thisParadigm, $yearToday, $obj, $sub, $objMoney, $subMoney, ratioCalc($objEconVal, $subEconVal), $objUseWeapon);
    $objMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
} elseif ($subAction == "melee") {
    $msgBox = initExchange($thisParadigm, $yearToday, $obj, $sub, $objMoney, $subMoney, ratioCalc($objEconVal, $subEconVal), $objUseMelee);
    $objMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
} elseif ($subAction == "shield") {
    $msgBox = initExchange($thisParadigm, $yearToday, $obj, $sub, $objMoney, $subMoney, ratioCalc($objEconVal, $subEconVal), $objUseShield);
    $objMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
}
