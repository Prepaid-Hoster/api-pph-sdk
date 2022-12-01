<?php

$hosting = include "hosting.php";

$reinstall = $hosting->write('stop-server');
print_r($reinstall->toArray());

//Array
//(
//    [data] => Array
//        (
//            [message] => The stop signal has been sent
//        )
//
//    [success] => 1
//)