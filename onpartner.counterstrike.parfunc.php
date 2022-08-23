<?php

$subActions = ["walk", "heal", "escort", "vendor", "withdraw"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "walk") {
    echo movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
} elseif ($subAction == "heal") {
    $objRating += $subHeal;
    $subScore += 5;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["heal"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "]<br>";
} elseif ($subAction == "escort") {
    $subDirect = rand(0, 3);
    if ($subDirect == 0) {
        $subX += $subMove;
        $objX += $subMove;
    } elseif ($subDirect == 1) {
        $subX -= $subMove;
        $objX -= $subMove;
    } elseif ($subDirect == 2) {
        $subY += $subMove;
        $objY += $subMove;
    } elseif ($subDirect == 3) {
        $subY -= $subMove;
        $objY -= $subMove;
    }
    $subScore += 5;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["escort"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "] {" .
        $objX .
        ";" .
        $objY .
        ";" .
        $objZ .
        "}<br>";
} elseif ($subAction == "vendor") {
    echo initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, $proUseWeapon);
} elseif ($subAction == "withdraw") {
    echo initExchange($thisParadigm, $yearToday, $sub, '.', $subMoney, $proMoney, $subUseWeapon);
}
