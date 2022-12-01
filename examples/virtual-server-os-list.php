<?php

$hosting = include "api.php";

$osList = $hosting->read('os-list');
print_r($osList->toArray());
