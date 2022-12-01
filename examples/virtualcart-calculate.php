<?php
/** @var \PrepaidHoster\Api\ApiClient $apiClient */
$apiClient = include "api.php";

$cart = $apiClient->post('/public/virtual-cart/calculate', [], [
    "promocode" => "GANZSCHOENEPYC20",
    "products" => [
        [
            "pid" => 269,
            "configoptions" => [ // IDs at public/products/269?options=true
                296 => 911, // Betriebssystem: Windows
                293 => 887 // CPU: 8 Kerne
                // Not given values will be minimum automatically
            ]
        ]
    ]
]);

// Generierten Warenkorb ausgeben
foreach ($cart->get("data.products") as $product) {
    echo $product["price"]["label"].PHP_EOL;
    foreach ($product["price"]["items"] as $item) {
        echo " - ".$item["label"]." - ".$item["price"];

        if(isset($item["meta"]["promotion"])) {
            echo " (Promotion)";
        } // if end

        echo PHP_EOL;
    } // foreach end

    echo "Gesamt: ".$product["price"]["sum"].PHP_EOL;
}

echo "Summe der Bestellung: ".$cart->get("data.summary.sum").PHP_EOL;

// echo json_encode($cart->get("data"), JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);

// KVM Root Server
// - Betriebssystem: Windows Server 2016/2019 (Evaluation Version) - 0
// - Prozessor: 8 Kerne garantiert - 12.65
// - RAM: 2GB RAM garantiert - 1.5
// - NVMe SSD Speicher: 50GB SSD - 2
// - Netzwerkgeschwindigkeit: bis zu 600 MBit/s - 0
// - Inklusiv Domains: 0 - 0
// - VCP Cloud Manager: Inklusive - 0
// - GANZSCHOENEPYC20 = wiederkehrend 20% - -3.23 (Promotion)
// Gesamt: 12.92
// Summe der Bestellung: 12.92

// {
//    "request": {
//        "promocode": "GANZSCHOENEPYC20",
//        "products": [
//            {
//                "pid": 269,
//                "configoptions": [
//                    911,
//                    887
//                ]
//            }
//        ]
//    },
//    "products": [
//        {
//            "pid": 269,
//            "configOptions": {
//                "296": 911,
//                "293": 887
//            },
//            "customFields": [],
//            "billingCycle": "monthly",
//            "price": {
//                "label": "KVM Root Server",
//                "items": [
//                    {
//                        "label": "Betriebssystem: Windows Server 2016\/2019 (Evaluation Version)",
//                        "price": 0,
//                        "meta": {
//                            "type": "ProductConfigOption",
//                            "option": {
//                                "label": "Betriebssystem",
//                                "id": 296,
//                                "system_value": "Betriebssystem"
//                            },
//                            "selected": {
//                                "label": "Windows Server 2016\/2019 (Evaluation Version)",
//                                "id": 911,
//                                "system_value": "Windows Server 2016\/2019 (Evaluation Version)"
//                            }
//                        }
//                    },
//                    {
//                        "label": "Prozessor: 8 Kerne garantiert",
//                        "price": 12.65,
//                        "meta": {
//                            "type": "ProductConfigOption",
//                            "option": {
//                                "label": "Prozessor",
//                                "id": 293,
//                                "system_value": "CPU Cores"
//                            },
//                            "selected": {
//                                "label": "8 Kerne garantiert",
//                                "id": 887,
//                                "system_value": "8"
//                            }
//                        }
//                    },
//                    {
//                        "label": "RAM: 2GB RAM garantiert",
//                        "price": 1.5,
//                        "meta": {
//                            "type": "ProductConfigOption",
//                            "option": {
//                                "label": "RAM",
//                                "id": 294,
//                                "system_value": "RAM"
//                            },
//                            "selected": {
//                                "label": "2GB RAM garantiert",
//                                "id": 985,
//                                "system_value": "2048"
//                            }
//                        }
//                    },
//                    {
//                        "label": "NVMe SSD Speicher: 50GB SSD",
//                        "price": 2,
//                        "meta": {
//                            "type": "ProductConfigOption",
//                            "option": {
//                                "label": "NVMe SSD Speicher",
//                                "id": 295,
//                                "system_value": "Space"
//                            },
//                            "selected": {
//                                "label": "50GB SSD",
//                                "id": 912,
//                                "system_value": "50"
//                            }
//                        }
//                    },
//                    {
//                        "label": "Netzwerkgeschwindigkeit: bis zu 600 MBit\/s",
//                        "price": 0,
//                        "meta": {
//                            "type": "ProductConfigOption",
//                            "option": {
//                                "label": "Netzwerkgeschwindigkeit",
//                                "id": 297,
//                                "system_value": "Network Speed"
//                            },
//                            "selected": {
//                                "label": "bis zu 600 MBit\/s",
//                                "id": 927,
//                                "system_value": "75000"
//                            }
//                        }
//                    },
//                    {
//                        "label": "Inklusiv Domains: 0",
//                        "price": 0,
//                        "meta": {
//                            "key": "inclusive_domains",
//                            "type": "special",
//                            "name": "Inklusiv Domains",
//                            "value": 0,
//                            "meta": {
//                                "next": {
//                                    "id": 19,
//                                    "type": "service",
//                                    "req_pid": "269",
//                                    "tld_list": "de",
//                                    "req_billingcycle": "monthly",
//                                    "req_min_amount": 13.5,
//                                    "domains_count": 1,
//                                    "enabled": 1,
//                                    "updated_at": null,
//                                    "created_at": null
//                                },
//                                "hide_in_checkout": true,
//                                "domain_value": 8.99,
//                                "missing_value": 0.5800000000000001
//                            }
//                        }
//                    },
//                    {
//                        "label": "VCP Cloud Manager: Inklusive",
//                        "price": 0,
//                        "meta": {
//                            "key": "vcp_cloud_manager",
//                            "type": "special",
//                            "name": "VCP Cloud Manager",
//                            "value": "Inklusive",
//                            "meta": []
//                        }
//                    },
//                    {
//                        "label": "GANZSCHOENEPYC20 = wiederkehrend 20%",
//                        "price": -3.23,
//                        "meta": {
//                            "promotion": true,
//                            "data": {
//                                "code": "GANZSCHOENEPYC20",
//                                "label": "GANZSCHOENEPYC20 = wiederkehrend 20%",
//                                "recurring": true,
//                                "recurring_for": true,
//                                "value": 20,
//                                "type": "Percentage"
//                            }
//                        }
//                    }
//                ],
//                "sum": 12.92
//            }
//        }
//    ],
//    "domains": [],
//    "summary": {
//        "label": "Warenkorb",
//        "items": [
//            {
//                "label": "KVM Root Server",
//                "price": 12.92,
//                "meta": []
//            }
//        ],
//        "sum": 12.92
//    }
//}