<?php
// Simple API endpoint for current time

$response = [
    'current_time' => [
        'utc' => gmdate('Y-m-d H:i:s'),
        'iso8601' => date('c'),
        'unix' => time(),
        'timezone' => date_default_timezone_get(),
    ],
    'server' => [
        'name' => gethostname(),
        'ip' => $_SERVER['SERVER_ADDR'] ?? 'unknown',
    ]
];

echo json_encode($response, JSON_PRETTY_PRINT);