<?php

if ($subHandle != '') {
    $subActions = ["bear", "steal", "drop"];
    $subActionCount = count($subActions);
    $subAction = $subActions[rand(0, $subActionCount - 1)];
    if ($subAction == 'bear') {
        if (file_exists($subHandle)) {
            $hanNotation = useNotation($subHandle);
            $hanCoord = file_get_contents($subHandle.'/coord');
            $hanX = explode(';', $hanCoord)[0];
            $hanY = explode(';', $hanCoord)[1];
            $hanZ = explode(';', $hanCoord)[2];
            $msgBox = synchrone($turnNum, $subNotation, $subX, $subY, $subZ, $hanNotation, $hanX, $hanY, $hanZ, 3, $subMove);
            $subX = $msgBox['i']['x'];
            $subY = $msgBox['i']['y'];
            $subZ = $msgBox['i']['z'];
            $hanX = $msgBox['j']['x'];
            $hanY = $msgBox['j']['y'];
            $hanZ = $msgBox['j']['z'];
            $subScore += 5;
            file_put_contents($han.'/coord', $hanX.';'.$hanY.';'.$hanZ);
            chmod($han.'/coord', 0777);
        } else {
            $msgBox = movement($turnNum, $subHalfNotation, $subX, $subY, $subZ, 3, $subMove);
            $subX = $msgBox['x'];
            $subY = $msgBox['y'];
            $subZ = $msgBox['z'];
        }
    } elseif ($subAction == 'drop') {
        $subHandle = '';
    } elseif ($subAction == 'steal') {
        if (file_exists($subHandle)) {
            $hanHalfNotation = useHalfNotation($subHandle);
            $hanMoney = file_get_contents($subHandle.'/money');
            echo $turnNum." : ".$subHalfNotation.' '.$spacedictus[$proLingo]['steal']." ".$hanMoney.' '.$spacedictus[$proLingo]['from'].' '.$hanHalfNotation."<br>";
            $hanMoney -= $hanMoney;
            $subMoney += $subMoney;
            $subScore += 10;
            file_put_contents($han.'/money', $hanMoney);
            chmod($han.'/money', 0777);
        } else {
            $msgBox = movement($turnNum, $subHalfNotation, $subX, $subY, $subZ, 3, $subMove);
            $subX = $msgBox['x'];
            $subY = $msgBox['y'];
            $subZ = $msgBox['z'];
        }
    }
} else {
    $subActions = ["walk", "pickup"];
    $subActionCount = count($subActions);
    $subAction = $subActions[rand(0, $subActionCount - 1)];
    if ($subAction == 'walk') {
        $msgBox = movement($turnNum, $subHalfNotation, $subX, $subY, $subZ, 3, $subMove);
        $subX = $msgBox['x'];
        $subY = $msgBox['y'];
        $subZ = $msgBox['z'];
    } elseif ($subAction == 'pickup') {
        $subHandle = $obj;
    }
}
