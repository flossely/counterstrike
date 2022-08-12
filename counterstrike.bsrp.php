<?php

// GETTING CURRENT YEAR FROM FILE
if (file_exists('year')) {
    $today = file_get_contents('year');
} else {
    $today = -2000;
}

function verbMode($m) {
    if ($m > 0) {
        $result = 'right';
    } elseif ($m < 0)
        $result = 'left';
    } else {
        $result = 'center';
    }
}

// GETTING DATA FROM HTTP REQUEST
$add = $_REQUEST['id'];
$team = $_REQUEST['team'];

if ($team == 'ct') {
    $addMode = 1;
    $addWeapon = 'ar15';
} elseif ($team == 't') {
    $addMode = -1;
    $addWeapon = 'ak47';
} else {
    $addMode = 0;
}

// CREATE OBJECT DIRECTORY IF NOT EXISTING
if (!file_exists($add)) {
    mkdir($add);
    chmod($add, 0777);
}

// THOSE FILES ONCE CREATED IN TARGET DIRECTORY WILL NOT BE OVERRIDDEN
if (!file_exists($add.'/coord')) {
    file_put_contents($add.'/coord', '0;0;0');
    chmod($add.'/coord', 0777);
}
if (!file_exists($add.'/rating')) {
    file_put_contents($add.'/rating', 50);
    chmod($add.'/rating', 0777);
}
if (!file_exists($add.'/mode')) {
    file_put_contents($add.'/mode', $addMode);
    chmod($add.'/mode', 0777);
}
if (!file_exists($add.'/score')) {
    file_put_contents($add.'/score', 0);
    chmod($add.'/score', 0777);
}
if (!file_exists($add.'/money')) {
    file_put_contents($add.'/money', 1000);
    chmod($add.'/money', 0777);
}
if (!file_exists($add.'/born')) {
    file_put_contents($add.'/born', $today);
    chmod($add.'/born', 0777);
}

// GETTING WEAPONS FOR AN OBJECT
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

// GETTING ICON FOR AN OBJECT
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
