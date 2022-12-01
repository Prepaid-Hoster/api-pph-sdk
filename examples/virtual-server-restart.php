<?php

$hosting = include "api.php";

$reinstall = $hosting->write('reboot-server');
print_r($reinstall->toArray());
