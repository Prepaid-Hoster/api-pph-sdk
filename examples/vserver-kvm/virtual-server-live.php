<?php

$hosting = include __DIR__ . "/../hosting.php";

// Server-Status
echo "Server-Status: ".$hosting->read("status")->get("data.status").PHP_EOL;

// Uptime
echo "Uptime: ".$hosting->read('live', ['methods' => 'uptime'])->get('data.uptime.human'), PHP_EOL;

// Disk-Space
$diskSpaceData = $hosting->read('live', ['methods' => 'disk-space']);
$usedDiskSpace = $diskSpaceData->get('data.disk-space.used');
$maxDiskSpace = $diskSpaceData->get('data.disk-space.size');

echo "Festplatte: ".round($usedDiskSpace, 1)." GB von ".round($maxDiskSpace, 1).PHP_EOL;

// Memory
$memoryData = $hosting->read('live', ['methods' => 'memory-usage']);
$totalMem = $memoryData->get('data.memory-usage.mem-total');
$freeMem = $memoryData->get('data.memory-usage.mem-free');
$memUsed = $totalMem - $freeMem;

echo "Memory: ".round($memUsed, 1)." MB/".round($totalMem, 1) ." used".PHP_EOL;

// Server-Status: running
// Uptime: 38 Sekunden
// Festplatte: 0.5 GB von 24.5
// Memory: 23.5 MB/1024 used