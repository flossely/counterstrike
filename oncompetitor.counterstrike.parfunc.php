<?php

$subActions = ["walk", "strike", "defend", "vendor", "withdraw"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "walk") {
    echo movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
} elseif ($subAction == "strike") {
    $objRating -= $subForce + $objShield;
    $subRating += $subForce - $objShield;
    $subScore += 5;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $subWeaponName .
        " (" .
        $subForce .
        ") " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "defend") {
    $subRating -= $objForce + $subShield;
    $objRating += $objForce - $subShield;
    $objScore += 5;
    echo $turnNum .
        " : " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "] " .
        $objWeaponName .
        " (" .
        $objForce .
        ") " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "]<br>";
} elseif ($subAction == "vendor") {
    echo initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, $proUseWeapon);
} elseif ($subAction == "withdraw") {
    echo initExchange($thisParadigm, $yearToday, $sub, '.', $subMoney, $proMoney, $subUseWeapon);
}
