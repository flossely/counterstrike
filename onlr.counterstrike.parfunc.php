<?php

$subActions = ['strike', 'melee'];
if ((isset($subUseWeapon['strafe_min'])) && (isset($subUseWeapon['strafe_max']))) {
    $subActions[] = 'strafe';
}
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

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
} elseif ($subAction == "melee") {
    if ($objUseShield !== null) {
        $objRating -= $subMeleeForce + $objShield;
        $subRating += $subMeleeForce - $objShield;
        $subScore += $subMeleeForce - $objShield;
    } else {
        $objRating -= $subMeleeForce;
        $subRating += $subMeleeForce;
        $subScore += $subMeleeForce;
    }
    echo $turnNum." : ".$subFullName.' '.$subMeleeType." (".$subMeleeForce."/".$objShield.") ".$objFullName."<br>";
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
