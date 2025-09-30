<?php
// API endpoint example - returns JSON

$response = [
    'status' => 'healthy',
    'timestamp' => date('c'),
    'server' => [
        'php_version' => phpversion(),
        'server_software' => $_SERVER['SERVER_SOFTWARE'],
        'memory_usage_mb' => round(memory_get_usage() / 1024 / 1024, 2),
        'peak_memory_mb' => round(memory_get_peak_usage() / 1024 / 1024, 2),
    ],
    'environment' => [
        'app' => getenv('APP') ?: 'local',
        'rack' => getenv('RACK') ?: 'local',
        'service' => getenv('SERVICE') ?: 'web',
        'build' => getenv('BUILD') ?: 'dev',
    ],
    'extensions' => get_loaded_extensions(),
];

echo json_encode($response, JSON_PRETTY_PRINT);