<?php

function parseArrayFile($name): array {
    $str = file_get_contents($name);
    $arr = explode('|[1]|', $str);
    $obj = [];
    foreach ($arr as $line) {
        $div = explode('|[>]|', $line);
        $prop = $div[0];
        $val = $div[1];
        $obj[$prop] = $val;
    }
    
    return $obj;
}

function parseGetData($data): array {
    $parse = explode('|[1]|', $data);
    $arr = [];
    foreach ($parse as $load) {
        $line = explode('|[>]|', $load);
        $prop = $line[0];
        $value = $line[1];
        $arr[$prop] = $value;
    }
    
    return $arr;
}

function gitExecute($host = 'https://github.com', $repo, $branch, $user) {
    if (file_exists($repo)) {
        chmod($repo, 0777);
        unlink($repo);
    }
    if ($branch != '') {
        exec('git clone -b '.$branch.' '.$host.'/'.$user.'/'.$repo);
    } else {
        exec('git clone '.$host.'/'.$user.'/'.$repo);
    }
    exec('chmod -R 777 .');
    chmod($repo, 0777);
}

function gitPerform($host = 'https://github.com', $repo, $branch, $user, $file, $dest, $name) {
    if (file_exists($repo)) {
        chmod($repo, 0777);
        rename($repo, $repo.'.d');
    }
    if ($branch != '') {
        exec('git clone -b '.$branch.' '.$host.'/'.$user.'/'.$repo);
    } else {
        exec('git clone '.$host.'/'.$user.'/'.$repo);
    }
    exec('chmod -R 777 .');
    chmod($repo, 0777);
    gitOperation($repo, $file, $dest, $name);
    exec('chmod -R 777 .');
    exec('rm -rf '.$repo);
    if (file_exists($repo.'.d')) {
        chmod($repo.'.d', 0777);
        rename($repo.'.d', $repo);
    }
}

function gitOperation($repo, $filename, $dest, $newname) {
    if (file_exists('./'.$repo.'/'.$filename)) {
        copy('./'.$repo.'/'.$filename, './'.$dest.'/'.$newname);
        chmod('./'.$dest.'/'.$newname, 0777);
    }
}

function verboseMode($m) {
    if ($m > 0) {
        return 'right';
    } elseif ($m < 0) {
        return 'left';
    } else {
        return 'center';
    }
}

if (file_exists('paradigm')) {
    $paradigm = file_get_contents('paradigm');
} else {
    $paradigm = 'system';
}
$paradigmData = parseArrayFile($paradigm.'.par');
if (file_exists('year')) {
    $today = file_get_contents('year');
} else {
    $today = $paradigmData['default_year'];
}
$lazones = str_replace('./','',(glob('./*.locale')));
if (file_exists('locale')) {
    $locale = file_get_contents('locale');
} else {
    $locale = basename(array_key_first($lazones), '.locale');
}
$lingua = $locale;

$add = $_REQUEST['id'];
$dataString = $_REQUEST['data'];

$objMeta = parseGetData($dataString);
if (isset($objMeta['mode'])) {
    $objMetaMode = $objMeta['mode'];
} else {
    $objMetaMode = 0;
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
    file_put_contents($add.'/mode', $objMetaMode);
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
$lallzones = str_replace($startDir.'/','',(glob($startDir.'/*.locale')));
foreach ($lallzones as $key=>$value) {
    $zrcut = basename($value, '.locale');
    if (!file_exists($add.'/'.$zrcut.'.cur')) {
        file_put_contents($add.'/'.$zrcut.'.cur', $paradigmData['default_currency_sign']);
        chmod($add.'/'.$zrcut.'.cur', 0777);
    }
    if (!file_exists($add.'/'.$zrcut.'.curval')) {
        file_put_contents($add.'/'.$zrcut.'.curval', $paradigmData['default_currency_value']);
        chmod($add.'/'.$zrcut.'.curval', 0777);
    }
}

if (isset($objMeta['name'])) {
    file_put_contents($add.'/name', $objMeta['name']);
    chmod($add.'/name', 0777);
}

gitPerform('https://github.com', 'logos', $paradigm, 'wholemarket', 'side.'.verboseMode($objMetaMode).'.png', $add, 'favicon.png');
if (isset($objMeta['weapon'])) {
    gitPerform('https://github.com', 'equipment', $paradigm, 'wholemarket', $objMeta['weapon'].'.weapon.obj', $add, $objMeta['weapon'].'.weapon.obj');
}
if (isset($objMeta['melee'])) {
    gitPerform('https://github.com', 'equipment', $paradigm, 'wholemarket', $objMeta['melee'].'.melee.obj', $add, $objMeta['melee'].'.melee.obj');
}
if (isset($objMeta['shield'])) {
    gitPerform('https://github.com', 'equipment', $paradigm, 'wholemarket', $objMeta['shield'].'.shield.obj', $add, $objMeta['shield'].'.shield.obj');
}
