<?php
$json = file_get_contents(__DIR__ . '/pages.json');
$pageName = basename($_SERVER['PHP_SELF']);
$obj = json_decode($json);

if (in_array($pageName, $obj->loggedInPages)) {
    require __DIR__ . '/header.php';
}

if (in_array($pageName, $obj->DBPages)) {
    require_once __DIR__ . '/dbHandler.php';
}

if (in_array($pageName, $obj->userpages)) {
    include __DIR__ . '/userMenu.php';
} elseif (in_array($pageName, $obj->adminpages)) {
    include __DIR__ . '/adminMenu.php';
}
?>