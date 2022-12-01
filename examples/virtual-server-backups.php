<?php

$hosting = include "api.php";

// Backups
$backupData = $hosting->read('backups');
print_r($backupData->toArray());
