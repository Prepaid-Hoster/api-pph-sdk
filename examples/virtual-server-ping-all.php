<?php
/** @var ApiClient $apiClient */

use PrepaidHoster\Api\ApiClient;

$apiClient = include "api.php";

$apiClient->getConfiguration()->setHeader("Accept-Language", "en");

try {
    $hostings = $apiClient->get("/client/hostings", ["status" => "Active", "module" => "virtualizor"]);
    foreach ($hostings->get("data") as $hosting) {
        $hostingId = $hosting["id"];
        $hostingApi = $apiClient->hosting($hostingId);
        $uptime = $hostingApi->read("live", ["methods" => "uptime"])->get("data.uptime.human");
        $status = $hostingApi->read("status")->get("data.status");
        $ping = $hostingApi->read("ping")->get("data.ping");

        if ($status === "running") {
            echo "Server ".$hosting["domain"]." is ".$status." - Ping: ".$ping." - up: ".$uptime.PHP_EOL;
        } else {
            echo "Server ".$hosting["domain"]." is ".$status.PHP_EOL;
        }
    }
} catch(Exception $e) {
    echo "A problem occurred: ".$e->getMessage();
}

// Server 28764-41003.pph-server.de is running - Ping: 5.64 - up: 2 weeks
// Server 78360-62294.pph-server.de is running - Ping: 5.77 - up: 1 minute
// Server 64731-41003.pph-server.de is running - Ping: 5.7 - up: 1 day