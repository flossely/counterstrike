<?php

$subActions = ["walk", "heal", "escort", "vendor", "withdraw"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "walk") {
    $msgBox = movement($turnNum, $subNotation, $subX, $subY, $subZ, 3, $subMove);
    $subX = $msgBox['x'];
    $subY = $msgBox['y'];
    $subZ = $msgBox['z'];
} elseif ($subAction == "heal") {
    $objRating += $subHeal;
    $subScore += 5;
    echo $turnNum." : ".$subHalfNotation.' '.$spacedictus[$proLingo]["heal"].' ('.$subHeal.') '.$objHalfNotation."<br>";
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
    echo $turnNum." : ".$subFullNotation." ".$spacedictus[$proLingo]["escort"]." ".$objFullNotation."<br>";
} elseif ($subAction == "vendor") {
    $msgBox = initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, ratioCalc($proEconVal, $subEconVal), $proUseWeapon);
    $proMoney = $msgBox['debit'];
    $subMoney = $msgBox['credit'];
} elseif ($subAction == "withdraw") {
    $msgBox = initExchange($thisParadigm, $yearToday, $sub, '.', $subMoney, $proMoney, ratioCalc($subEconVal, $proEconVal), $subUseWeapon);
    $subMoney = $msgBox['debit'];
    $proMoney = $msgBox['credit'];
}
