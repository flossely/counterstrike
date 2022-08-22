<?php

$subActions = ["walk"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "walk") {
    $subDirect = rand(0, 3);
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
    }
}
