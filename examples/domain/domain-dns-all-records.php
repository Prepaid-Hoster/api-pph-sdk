<?php

/** @var \PrepaidHoster\Api\ApiClient $clientApi */
$apiClient = include '../api.php';

// Get all records
$dns = $apiClient->get('client/domains/'.DOMAIN_ID.'/dns/records');
print_r($dns->toArray());

//Array
//(
//    [data] => Array
//        (
//            [domain] => clientify.de
//            [records] => Array
//                (
//                    [0] => Array
//                        (
//                            [id] => 328030
//                            [name] => www
//                            [full_name] => www.clientify.de
//                            [type] => A
//                            [content] => 127.0.0.1
//                            [last_changed] => 1669977296
//                            [ttl] => 86400
//                            [editable] => 1
//                        )
// ...

