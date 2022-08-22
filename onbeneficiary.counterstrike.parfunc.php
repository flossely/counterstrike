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
