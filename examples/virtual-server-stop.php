<?php

$hosting = include "api.php";

$reinstall = $hosting->write('stop-server');
print_r($reinstall->toArray());
