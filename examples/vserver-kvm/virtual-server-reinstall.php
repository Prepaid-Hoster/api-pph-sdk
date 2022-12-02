<?php

$hosting = include __DIR__ . "/../hosting.php";

$osid = 100037; // debian-11.3-x86_64-minimal
$reinstall = $hosting->write('reinstall-server', ['osid' => $osid]);
print_r($reinstall->toArray());

//Array
//(
//    [data] => Array
//        (
//            [message] => The installation has been started
//        )
//
//    [success] => 1
//)