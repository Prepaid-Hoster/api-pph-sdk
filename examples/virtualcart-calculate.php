<?php
/** @var \PrepaidHoster\Api\ApiClient $apiClient */
$apiClient = include "api.php";

$cart = $apiClient->post('/public/virtual-cart/calculate', [], [
    "promocode" => "GANZSCHOENEPYC20",
    "products" => [
        [
            "pid" => 269
        ]
    ]
]);

foreach ($cart->get("data.products") as $product) {
    echo $product["price"]["label"].PHP_EOL;
    foreach ($product["price"]["items"] as $item) {
        echo " - ".$item["label"]." - ".$item["price"].PHP_EOL;
    } // foreach end

    echo "Gesamt: ".$product["price"]["sum"].PHP_EOL;
}

echo "Summe der Bestellung: ".$cart->get("data.summary.sum").PHP_EOL;

// KVM Root Server
// - Betriebssystem: Linux - 0
// - Prozessor: 2 Kerne garantiert - 2.75
// - RAM: 2GB RAM garantiert - 1.5
// - NVMe SSD Speicher: 50GB SSD - 2
// - Netzwerkgeschwindigkeit: bis zu 600 MBit/s - 0
// - Inklusiv Domains: 0 - 0
// - VCP Cloud Manager: Inklusive - 0
// - GANZSCHOENEPYC20 = wiederkehrend 20% - -1.25
// Gesamt: 5
// Summe der Bestellung: 5

// Array
//(
//    [data] => Array
//        (
//            [request] => Array
//                (
//                    [products] => Array
//                        (
//                            [0] => Array
//                                (
//                                    [pid] => 269
//                                )
//
//                        )
//
//                )
//
//            [products] => Array
//                (
//                    [0] => Array
//                        (
//                            [pid] => 269
//                            [configOptions] => Array
//                                (
//                                )
//
//                            [customFields] => Array
//                                (
//                                )
//
//                            [billingCycle] => monthly
//                            [price] => Array
//                                (
//                                    [label] => KVM Root Server
//                                    [items] => Array
//                                        (
//                                            [0] => Array
//                                                (
//                                                    [label] => Betriebssystem: Linux
//                                                    [price] => 0
//                                                    [meta] => Array
//                                                        (
//                                                            [type] => ProductConfigOption
//                                                            [option] => Array
//                                                                (
//                                                                    [label] => Betriebssystem
//                                                                    [id] => 296
//                                                                    [system_value] => Betriebssystem
//                                                                )
//
//                                                            [selected] => Array
//                                                                (
//                                                                    [label] => Linux
//                                                                    [id] => 910
//                                                                    [system_value] => Linux
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                            [1] => Array
//                                                (
//                                                    [label] => Prozessor: 2 Kerne garantiert
//                                                    [price] => 2.75
//                                                    [meta] => Array
//                                                        (
//                                                            [type] => ProductConfigOption
//                                                            [option] => Array
//                                                                (
//                                                                    [label] => Prozessor
//                                                                    [id] => 293
//                                                                    [system_value] => CPU Cores
//                                                                )
//
//                                                            [selected] => Array
//                                                                (
//                                                                    [label] => 2 Kerne garantiert
//                                                                    [id] => 880
//                                                                    [system_value] => 2
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                            [2] => Array
//                                                (
//                                                    [label] => RAM: 2GB RAM garantiert
//                                                    [price] => 1.5
//                                                    [meta] => Array
//                                                        (
//                                                            [type] => ProductConfigOption
//                                                            [option] => Array
//                                                                (
//                                                                    [label] => RAM
//                                                                    [id] => 294
//                                                                    [system_value] => RAM
//                                                                )
//
//                                                            [selected] => Array
//                                                                (
//                                                                    [label] => 2GB RAM garantiert
//                                                                    [id] => 985
//                                                                    [system_value] => 2048
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                            [3] => Array
//                                                (
//                                                    [label] => NVMe SSD Speicher: 50GB SSD
//                                                    [price] => 2
//                                                    [meta] => Array
//                                                        (
//                                                            [type] => ProductConfigOption
//                                                            [option] => Array
//                                                                (
//                                                                    [label] => NVMe SSD Speicher
//                                                                    [id] => 295
//                                                                    [system_value] => Space
//                                                                )
//
//                                                            [selected] => Array
//                                                                (
//                                                                    [label] => 50GB SSD
//                                                                    [id] => 912
//                                                                    [system_value] => 50
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                            [4] => Array
//                                                (
//                                                    [label] => Netzwerkgeschwindigkeit: bis zu 600 MBit/s
//                                                    [price] => 0
//                                                    [meta] => Array
//                                                        (
//                                                            [type] => ProductConfigOption
//                                                            [option] => Array
//                                                                (
//                                                                    [label] => Netzwerkgeschwindigkeit
//                                                                    [id] => 297
//                                                                    [system_value] => Network Speed
//                                                                )
//
//                                                            [selected] => Array
//                                                                (
//                                                                    [label] => bis zu 600 MBit/s
//                                                                    [id] => 927
//                                                                    [system_value] => 75000
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                            [5] => Array
//                                                (
//                                                    [label] => Inklusiv Domains: 0
//                                                    [price] => 0
//                                                    [meta] => Array
//                                                        (
//                                                            [key] => inclusive_domains
//                                                            [type] => special
//                                                            [name] => Inklusiv Domains
//                                                            [value] => 0
//                                                            [meta] => Array
//                                                                (
//                                                                    [next] => Array
//                                                                        (
//                                                                            [id] => 19
//                                                                            [type] => service
//                                                                            [req_pid] => 269
//                                                                            [tld_list] => de
//                                                                            [req_billingcycle] => monthly
//                                                                            [req_min_amount] => 13.5
//                                                                            [domains_count] => 1
//                                                                            [enabled] => 1
//                                                                            [updated_at] =>
//                                                                            [created_at] =>
//                                                                        )
//
//                                                                    [hide_in_checkout] => 1
//                                                                    [domain_value] => 8.99
//                                                                    [missing_value] => 7.25
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                            [6] => Array
//                                                (
//                                                    [label] => VCP Cloud Manager: Inklusive
//                                                    [price] => 0
//                                                    [meta] => Array
//                                                        (
//                                                            [key] => vcp_cloud_manager
//                                                            [type] => special
//                                                            [name] => VCP Cloud Manager
//                                                            [value] => Inklusive
//                                                            [meta] => Array
//                                                                (
//                                                                )
//
//                                                        )
//
//                                                )
//
//                                        )
//
//                                    [sum] => 6.25
//                                )
//
//                        )
//
//                )
//
//            [domains] => Array
//                (
//                )
//
//            [summary] => Array
//                (
//                    [label] => Warenkorb
//                    [items] => Array
//                        (
//                            [0] => Array
//                                (
//                                    [label] => KVM Root Server
//                                    [price] => 6.25
//                                    [meta] => Array
//                                        (
//                                        )
//
//                                )
//
//                        )
//
//                    [sum] => 6.25
//                )
//
//        )
//
//)