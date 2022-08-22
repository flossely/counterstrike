<?php

include 'basefunc.php';
include 'dataload.php';

function verbMode($m) {
    if ($m > 0) {
        $result = 'right';
    } elseif ($m < 0) {
        $result = 'left';
    } else {
        $result = 'center';
    }
    
    return $result;
}

$add = $_REQUEST['id'];
$dataString = $_REQUEST['data'];

$metadata = parseGetData($dataString);
$team = $metadata['team'];

if ($team == 'ct') {
    $addMode = 1;
    $addWeapon = 'ar15';
} elseif ($team == 't') {
    $addMode = -1;
    $addWeapon = 'ak47';
} else {
    $addMode = 0;
}

if (!file_exists($add)) {
    mkdir($add);
    chmod($add, 0777);
}

if (!file_exists($add.'/coord')) {
    file_put_contents($add.'/coord', $paradigmData['default_coord']);
    chmod($add.'/coord', 0777);
}
if (!file_exists($add.'/rating')) {
    file_put_contents($add.'/rating', $paradigmData['default_rating']);
    chmod($add.'/rating', 0777);
}
if (!file_exists($add.'/mode')) {
    file_put_contents($add.'/mode', $addMode);
    chmod($add.'/mode', 0777);
}
if (!file_exists($add.'/score')) {
    file_put_contents($add.'/score', $paradigmData['default_score']);
    chmod($add.'/score', 0777);
}
if (!file_exists($add.'/money')) {
    file_put_contents($add.'/money', $paradigmData['default_money']);
    chmod($add.'/money', 0777);
}
if (!file_exists($add.'/born')) {
    file_put_contents($add.'/born', $today);
    chmod($add.'/born', 0777);
}

file_put_contents($add.'/locale', $lingua);
chmod($add.'/locale', 0777);

if ($addMode != 0) {
    if (file_exists('weapons')) {
        chmod('weapons', 0777);
        rename('weapons', 'weapons.d');
    }
    exec('git clone -b counterstrike https://github.com/wholemarket/weapons');
    chmod('weapons', 0777);
    copy('./weapons/'.$addWeapon.'.weapon.obj', './'.$add.'/'.$addWeapon.'.weapon.obj');
    exec('chmod -R 777 .');
    exec('rm -rf weapons');
    if (file_exists('weapons.d')) {
        chmod('weapons.d', 0777);
        rename('weapons.d', 'weapons');
    }
}

if (file_exists('logos')) {
    chmod('logos', 0777);
    rename('logos', 'logos.d');
}
exec('git clone -b counterstrike https://github.com/wholemarket/logos');
chmod('logos', 0777);
copy('./logos/side.'.verbMode($addMode).'.png', './'.$add.'/favicon.png');
exec('chmod -R 777 .');
exec('rm -rf logos');
if (file_exists('logos.d')) {
    chmod('logos.d', 0777);
    rename('logos.d', 'logos');
}
