<?php

$subActions = ["walk"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];
if ($subAction == "walk") {
    $subDirect = rand(0, 3);
    if ($subDirect == 0) {
        $subX += $subMove;
        $subScore += 1;
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["right"] .
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
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["left"] .
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
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["forward"] .
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
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["back"] .
            " {" .
            $subX .
            ";" .
            $subY .
            ";" .
            $subZ .
            "}<br>";
    }
}
