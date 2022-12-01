# Example

```php
<?php
use PrepaidHoster\Api\ApiClient;
use PrepaidHoster\Api\ApiConfiguration;

include "vendor/autoload.php";

const API_TOKEN = "";

$apiClient = new ApiClient(new ApiConfiguration(["token" => API_TOKEN]));

// Set output language to "english"
$apiClient->getConfiguration()->setHeader("Accept-Language", "en");

try {
    // Get all active openvz and kvm servers
    
    $hostings = $apiClient->get("/client/hostings", ["status" => "Active", "module" => "virtualizor"]);
    
    // Iterate:
    foreach ($hostings->get("data") as $hosting) {
        $hostingId = $hosting["id"];
        $hostingApi = $apiClient->hosting($hostingId);
        
        // Get live uptime
        $uptime = $hostingApi->read("live", ["methods" => "uptime"])->get("data.uptime.human");
        
        // Get live status
        $status = $hostingApi->read("status")->get("data.status");
        
        // Get live ping
        $ping = $hostingApi->read("ping")->get("data.ping");

        // OUTPUT
        if ($status === "running") {
            echo "Server ".$hosting["domain"]." is ".$status." - Ping: ".$ping." - up: ".$uptime.PHP_EOL;
        } else {
            echo "Server ".$hosting["domain"]." is ".$status.PHP_EOL;
        }
    }
} catch(Exception $e) {
    echo "A problem occurred: ".$e->getMessage();
}

```
