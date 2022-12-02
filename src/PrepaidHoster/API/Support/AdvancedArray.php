<?php

namespace PrepaidHoster\Api\Support;

class AdvancedArray
{
    private array $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function get(string $key, $default = null)
    {
        return $this->getValueByKey($key, $this->array, $default);
    }

    private function getValueByKey($key, array $data, $default) {
        if (!is_string($key) || empty($key) || !count($data)) {
            return $default;
        }

        if (strpos($key, '.') !== false) {
            $keys = explode('.', $key);
            foreach ($keys as $innerKey) {
                if (!array_key_exists($innerKey, $data)) {
                    return $default;
                }
                $data = $data[$innerKey];
            }
            return $data;
        }
        return array_key_exists($key, $data) ? $data[$key] : $default;
    }
}