<?php

/** @var \PrepaidHoster\Api\ApiClient $clientApi */
$apiClient = include '../api.php';

// Create a new record
$createRecord = $apiClient->post('client/domains/'.DOMAIN_ID.'/dns/record/create', [], [
    'record' => [
        'name' => 'my-txt-record',
        'type' => 'TXT',
        'content' => 'my-txt-content'
    ]
]);
print_r($createRecord->toArray());

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

