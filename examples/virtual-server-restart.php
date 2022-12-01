<?php

$hosting = include "hosting.php";

$reinstall = $hosting->write('reboot-server');
print_r($reinstall->toArray());
