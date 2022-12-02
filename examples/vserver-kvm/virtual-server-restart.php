<?php

$hosting = include __DIR__ . "/../hosting.php";

$reinstall = $hosting->write('reboot-server');
print_r($reinstall->toArray());
