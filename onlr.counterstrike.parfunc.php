<?php

$subActions = ['strike', 'melee'];
$subActionCount = count($subActions);
$subAction = $subActions[rand(0, $subActionCount - 1)];

if ($subAction == "strike") {
    if ($objUseShield !== null) {
        $objRating -= $subForce + $objShield;
        $subScore += $subForce - $objShield;
        echo $turnNum." : ".$subFullName.' '.$subForceType." (".$subForce."/".$objShield.") ".$objFullName."<br>";
    } else {
        $objRating -= $subForce;
        $subScore += $subForce;
        echo $turnNum." : ".$subFullName.' '.$subForceType." (".$subForce.") ".$objFullName."<br>";
    }
} elseif ($subAction == "melee") {
    if ($objUseShield !== null) {
        $objRating -= $subMeleeForce + $objShield;
        $subScore += $subMeleeForce - $objShield;
        echo $turnNum." : ".$subFullName.' '.$subMeleeType." (".$subMeleeForce."/".$objShield.") ".$objFullName."<br>";
    } else {
        $objRating -= $subMeleeForce;
        $subScore += $subMeleeForce;
        echo $turnNum." : ".$subFullName.' '.$subMeleeType." (".$subMeleeForce.") ".$objFullName."<br>";
    }
}
