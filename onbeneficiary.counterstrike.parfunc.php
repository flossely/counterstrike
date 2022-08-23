<?php

$subActions = ["close", "take", "vendor", "withdraw"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "close") {
    $subX = $objX;
    $subY = $objY;
    $subZ = $objZ;
    $subScore += 10;
    echo $turnNum .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$proLingo]["tract"] .
        " " .
        $objModeSign .
        $obj .
        "[" .
        $objRating .
        "] {" .
        $subX .
        ";" .
        $subY .
        ";" .
        $subZ .
        "}<br>";
} elseif ($subAction == "take") {
    $subDirect = rand(0, 5);
    if ($subDirect == 0) {
        $subX += $subMove;
        $subScore += 1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["right"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 1) {
        $subX -= $subMove;
        $subScore += 1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["left"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 2) {
        $subY += $subMove;
        $subScore += 1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["forward"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 3) {
        $subY -= $subMove;
        $subScore += 1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["back"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 4) {
        $subZ += $subMove;
        $subScore += 1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["up"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    } elseif ($subDirect == 5) {
        $subZ -= $subMove;
        $subScore += 1;
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["down"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    }
    $objX = $subX;
    $objY = $subY;
    $objZ = $subZ;
} elseif ($subAction == "vendor") {
    echo initExchange($thisParadigm, $yearToday, '.', $sub, $proMoney, $subMoney, ratioCalc($proEconVal, $subEconVal), $proUseWeapon);
} elseif ($subAction == "withdraw") {
    echo initExchange($thisParadigm, $yearToday, $sub, '.', $subMoney, $proMoney, ratioCalc($subEconVal, $proEconVal), $subUseWeapon);
}
