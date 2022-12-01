<?php

$hosting = include "hosting.php";

// Backups
$backupData = $hosting->read('backups');
print_r($backupData->toArray());

// Array
//(
//    [data] => Array
//        (
//            [backups] => Array
//                (
//                    [0] => Array
//                        (
//                            [id] => 8_1669912817_27041_78360-62294-pph-server-de_2022_12_01-16_40_17.tar.gz
//                            [date] => 20221201
//                            [abs_path] => backups/20221201/27041_78360-62294-pph-server-de_2022_12_01-16_40_17.tar.gz
//                            [size] => 2253744
//                            [dir] => backups
//                            [bsid] => 8
//                            [size_gb] => 2
//                            [name] => 27041_78360-62294-pph-server-de_2022_12_01-16_40_17.tar.gz
//                            [created_at] => 01.12.2022
//                            [created_at_time] => 17:40
//                            [created_at_full] => 01.12.2022 17:40
//                            [created_at_human] => vor 1 Std.
//                            [download] => https://backups.http.pph.sh/download.php?[...]
//                        )
//
//                )
//
//        )
//
//)