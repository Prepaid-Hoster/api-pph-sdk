<?php

$hosting = include __DIR__ . "/../hosting.php";

$osList = $hosting->read('os-list');
print_r($osList->toArray());

// Array
//(
//    [data] => Array
//        (
//            [0] => Array
//                (
//                    [id] => 619
//                    [name] => suse-13.2-x86_64
//                    [label] => Suse 13.2
//                    [distro] => Suse
//                    [version] => 13.2
//                    [arch] => x86_64
//                    [tag] =>
//                    [windows] =>
//                )
//
//            [1] => Array
//                (
//                    [id] => 903
//                    [name] => centos-8-x86_64
//                    [label] => Centos 8
//                    [distro] => Centos
//                    [version] => 8
//                    [arch] => x86_64
//                    [tag] =>
//                    [windows] =>
//                )
//
//            [2] => Array
//                (
//                    [id] => 100018
//                    [name] => debian-9.9-x86_64-minimal
//                    [label] => Debian 9.9 minimal
//                    [distro] => Debian
//                    [version] => 9.9
//                    [arch] => x86_64
//                    [tag] => minimal
//                    [windows] =>
//                )
//
//            [3] => Array
//                (
//                    [id] => 100034
//                    [name] => debian-10.9-x86_64-minimal
//                    [label] => Debian 10.9 minimal
//                    [distro] => Debian
//                    [version] => 10.9
//                    [arch] => x86_64
//                    [tag] => minimal
//                    [windows] =>
//                )
//
//            [4] => Array
//                (
//                    [id] => 100037
//                    [name] => debian-11.3-x86_64-minimal
//                    [label] => Debian 11.3 minimal
//                    [distro] => Debian
//                    [version] => 11.3
//                    [arch] => x86_64
//                    [tag] => minimal
//                    [windows] =>
//                )
//
//            [5] => Array
//                (
//                    [id] => 100021
//                    [name] => ubuntu-18.04-x86_64-minimal
//                    [label] => Ubuntu 18.04 minimal
//                    [distro] => Ubuntu
//                    [version] => 18.04
//                    [arch] => x86_64
//                    [tag] => minimal
//                    [windows] =>
//                )
//
//            [6] => Array
//                (
//                    [id] => 100028
//                    [name] => ubuntu-20.04-x86_64
//                    [label] => Ubuntu 20.04
//                    [distro] => Ubuntu
//                    [version] => 20.04
//                    [arch] => x86_64
//                    [tag] =>
//                    [windows] =>
//                )
//
//            [7] => Array
//                (
//                    [id] => 100038
//                    [name] => ubuntu-22.04-x86_64-minimal
//                    [label] => Ubuntu 22.04 minimal
//                    [distro] => Ubuntu
//                    [version] => 22.04
//                    [arch] => x86_64
//                    [tag] => minimal
//                    [windows] =>
//                )
//
//        )
//
//)
