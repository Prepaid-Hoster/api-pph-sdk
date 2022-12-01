<?php

$hosting = include "api.php";

// Server-Status
echo "Server-Status: ".$hosting->read("status")->get("data.status").PHP_EOL;

// Uptime
echo "Uptime: ".$hosting->read('live', ['methods' => 'uptime'])->get('data.uptime.human'), PHP_EOL;

// Disk-Space
$diskSpaceData = $hosting->read('live', ['methods' => 'disk-space']);
$usedDiskSpace = $diskSpaceData->get('data.disk-space.used');
$maxDiskSpace = $diskSpaceData->get('data.disk-space.size');

echo "Festplatte: ".round($usedDiskSpace, 1)." GB von ".round($maxDiskSpace, 1).PHP_EOL;

// Tasks
$tasks = $hosting->read('tasks');
print_r($tasks->toArray());

// Available OS
