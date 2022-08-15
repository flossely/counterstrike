<?php

$subActions = ["walk", "heal", "escort", "vendor", "withdraw"];
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
} elseif ($subAction == "heal") {
    $objRating += $subHeal;
    $subScore += 5;
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["heal"] .
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
    echo turnFormat($paradigm, $today) .
        " : " .
        $subModeSign .
        $sub .
        "[" .
        $subRating .
        "] " .
        $spacedictus[$lingua]["escort"] .
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
    if (!file_exists($searchSubFor . "/" . $randomObjectPro)) {
        if ($proWeaponPrice > 0) {
            $weaponOfferSum = $proWeaponPrice;
            if ($subMoney >= $weaponOfferSum) {
                $proMoney += $weaponOfferSum;
                $subMoney -= $weaponOfferSum;
                chmod($searchProFor . "/" . $randomObjectPro, 0777);
                rename(
                    $searchProFor . "/" . $randomObjectPro,
                    $searchSubFor . "/" . $randomObjectPro
                );
                echo turnFormat($paradigm, $today) .
                    " : " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] " .
                    $spacedictus[$lingua]["bought"] .
                    " " .
                    $proWeaponName .
                    " " .
                    $spacedictus[$lingua]["for"] .
                    " " .
                    $proWeaponPrice .
                    " " .
                    $spacedictus[$lingua]["cur"] .
                    " " .
                    $spacedictus[$lingua]["from"] .
                    " /system/<br>";
            } else {
                echo turnFormat($paradigm, $today) .
                    " : /system/ " .
                    $spacedictus[$lingua]["to"] .
                    " " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] - " .
                    $spacedictus[$lingua]["insufficient"] .
                    "<br>";
            }
        } else {
            echo turnFormat($paradigm, $today) .
                " : /system/ " .
                $spacedictus[$lingua]["to"] .
                " " .
                $subModeSign .
                $sub .
                "[" .
                $subRating .
                "] - " .
                $spacedictus[$lingua]["nothing"] .
                "<br>";
        }
    } else {
        echo turnFormat($paradigm, $today) .
            " : /system/ " .
            $spacedictus[$lingua]["to"] .
            " " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] - " .
            $spacedictus[$lingua]["already"] .
            "<br>";
    }
} elseif ($subAction == "withdraw") {
    if (!file_exists($searchProFor . "/" . $randomObjectSub)) {
        if ($subWeaponPrice > 0) {
            $weaponOfferSum = $subWeaponPrice;
            if ($proMoney >= $weaponOfferSum) {
                $proMoney -= $weaponOfferSum;
                $subMoney += $weaponOfferSum;
                chmod($searchSubFor . "/" . $randomObjectSub, 0777);
                rename(
                    $searchSubFor . "/" . $randomObjectSub,
                    $searchProFor . "/" . $randomObjectSub
                );
                echo turnFormat($paradigm, $today) .
                    " : " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] " .
                    $spacedictus[$lingua]["sold"] .
                    " " .
                    $subWeaponName .
                    " " .
                    $spacedictus[$lingua]["for"] .
                    " " .
                    $subWeaponPrice .
                    " " .
                    $spacedictus[$lingua]["cur"] .
                    " " .
                    $spacedictus[$lingua]["to"] .
                    " /system/<br>";
            } else {
                echo turnFormat($paradigm, $today) .
                    " : " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] " .
                    $spacedictus[$lingua]["to"] .
                    " /system/ - " .
                    $spacedictus[$lingua]["insufficient"] .
                    "<br>";
            }
        } else {
            echo turnFormat($paradigm, $today) .
                " : " .
                $subModeSign .
                $sub .
                "[" .
                $subRating .
                "] " .
                $spacedictus[$lingua]["to"] .
                " /system/ - " .
                $spacedictus[$lingua]["nothing"] .
                "<br>";
        }
    } else {
        echo turnFormat($paradigm, $today) .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$lingua]["to"] .
            " /system/ - " .
            $spacedictus[$lingua]["already"] .
            "<br>";
    }
}
