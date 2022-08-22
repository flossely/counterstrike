<?php

$subActions = ["walk", "heal", "escort", "vendor", "withdraw"];
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
    if (!file_exists("./" . $sub . "/" . $proWeaponObjID . '.' . $proWeaponObjClass . '.obj')) {
        if ($proWeaponPrice > 0) {
            $weaponOfferSum = $proWeaponPrice;
            if ($subMoney >= $weaponOfferSum) {
                $proMoney += $weaponOfferSum;
                $subMoney -= $weaponOfferSum;
                chmod("./" . $proWeaponObjID . '.' . $proWeaponObjClass . '.obj', 0777);
                rename(
                    "./" . $proWeaponObjID . '.' . $proWeaponObjClass . '.obj',
                    "./" . $sub . "/" . $proWeaponObjID . '.' . $proWeaponObjClass . '.obj'
                );
                echo $turnNum .
                    " : " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] " .
                    $spacedictus[$proLingo]["bought"] .
                    " " .
                    $proWeaponName .
                    " " .
                    $spacedictus[$proLingo]["for"] .
                    " " .
                    $proWeaponPrice .
                    " " .
                    $spacedictus[$proLingo]["cur"] .
                    " " .
                    $spacedictus[$proLingo]["from"] .
                    " /system/<br>";
            } else {
                echo $turnNum .
                    " : /system/ " .
                    $spacedictus[$proLingo]["to"] .
                    " " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] - " .
                    $spacedictus[$proLingo]["insufficient"] .
                    "<br>";
            }
        } else {
            echo $turnNum .
                " : /system/ " .
                $spacedictus[$proLingo]["to"] .
                " " .
                $subModeSign .
                $sub .
                "[" .
                $subRating .
                "] - " .
                $spacedictus[$proLingo]["nothing"] .
                "<br>";
        }
    } else {
        echo $turnNum .
            " : /system/ " .
            $spacedictus[$proLingo]["to"] .
            " " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] - " .
            $spacedictus[$proLingo]["already"] .
            "<br>";
    }
} elseif ($subAction == "withdraw") {
    if (!file_exists("./" . $subWeaponObjID . '.' . $subWeaponObjClass . '.obj')) {
        if ($subWeaponPrice > 0) {
            $weaponOfferSum = $subWeaponPrice;
            if ($proMoney >= $weaponOfferSum) {
                $proMoney -= $weaponOfferSum;
                $subMoney += $weaponOfferSum;
                chmod("./" . $sub  . "/" . $subWeaponObjID . '.' . $subWeaponObjClass . '.obj', 0777);
                rename(
                    "./" . $sub  . "/" . $subWeaponObjID . '.' . $subWeaponObjClass . '.obj',
                    "./" . $subWeaponObjID . '.' . $subWeaponObjClass . '.obj'
                );
                echo $turnNum .
                    " : " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] " .
                    $spacedictus[$proLingo]["sold"] .
                    " " .
                    $subWeaponName .
                    " " .
                    $spacedictus[$proLingo]["for"] .
                    " " .
                    $subWeaponPrice .
                    " " .
                    $spacedictus[$proLingo]["cur"] .
                    " " .
                    $spacedictus[$proLingo]["to"] .
                    " /system/<br>";
            } else {
                echo $turnNum .
                    " : " .
                    $subModeSign .
                    $sub .
                    "[" .
                    $subRating .
                    "] " .
                    $spacedictus[$proLingo]["to"] .
                    " /system/ - " .
                    $spacedictus[$proLingo]["insufficient"] .
                    "<br>";
            }
        } else {
            echo $turnNum .
                " : " .
                $subModeSign .
                $sub .
                "[" .
                $subRating .
                "] " .
                $spacedictus[$proLingo]["to"] .
                " /system/ - " .
                $spacedictus[$proLingo]["nothing"] .
                "<br>";
        }
    } else {
        echo $turnNum .
            " : " .
            $subModeSign .
            $sub .
            "[" .
            $subRating .
            "] " .
            $spacedictus[$proLingo]["to"] .
            " /system/ - " .
            $spacedictus[$proLingo]["already"] .
            "<br>";
    }
}
