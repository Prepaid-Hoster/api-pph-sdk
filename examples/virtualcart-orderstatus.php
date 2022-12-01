<?php
/** @var \PrepaidHoster\Api\ApiClient $apiClient */
$apiClient = include "api.php";

$order = $apiClient->get('/public/virtual-cart/order/status/4ae0b4ad-ddb4-4676-a6c9-41e9783ab433');

echo json_encode($order->get("data"), JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);

// {
//    "placed": true,
//    "transaction": {
//        "request_payload": {
//            "promocode": "LASSKNACKEN30",
//            "products": [
//                {
//                    "pid": 288,
//                    "configoptions": [
//                        432
//                    ]
//                }
//            ],
//            "agb_accepted": true,
//            "privacy_policy_accepted": true,
//            "waive_of_revocation": true
//        },
//        "amount": 3.71,
//        "uuid": "4ae0b4ad-ddb4-4676-a6c9-41e9783ab433",
//        "updated_at": "2022-12-01T18:54:17.000000Z",
//        "created_at": "2022-12-01T18:54:17.000000Z",
//        "id": 5
//    },
//    "cart": {
//        "label": "Warenkorb",
//        "items": [
//            {
//                "label": "Linux vServer",
//                "price": 3.71,
//                "meta": []
//            }
//        ],
//        "sum": 3.71
//    }
//}