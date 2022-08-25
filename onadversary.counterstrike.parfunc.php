<?php

$subActions = ["strike"];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if (isset($subUseWeapon['strafe_min']) && isset($subUseWeapon['strafe_max'])) {
    $subActions[] = "strafe";
}

if ($subAction == "strike") {
    if ($objUseShield !== null) {
        $objRating -= $subForce + $objShield;
        $subRating += $subForce - $objShield;
        $subScore += $subForce - $objShield;
    } else {
        $objRating -= $subForce;
        $subRating += $subForce;
        $subScore += $subForce;
    }
    echo $turnNum." : ".$subFullName.' '.$subForceType." (".$subForce."/".$objShield.") ".$objFullName."<br>";
} elseif ($subAction == "strafe") {
    $subShootCount = rand($subUseWeapon['strafe_min'], $subUseWeapon['strafe_max']);
    $subShootSum = 0;
    for ($i = 0; $i < $subShootCount; $i++) {
        if ($objUseShield !== null) {
            $objRating -= $subForce + $objShield;
            $subRating += $subForce - $objShield;
            $subScore += $subForce - $objShield;
            $subShootSum += $subForce - $objShield;
        } else {
            $objRating -= $subForce;
            $subRating += $subForce;
            $subScore += $subForce;
            $subShootSum += $subForce;
        }
    }
    echo $turnNum." : ".$subFullName.' '.$subForceType." (".$subShootSum.") ".$objFullName."<br>";
}
