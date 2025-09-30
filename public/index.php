<?php
// Example PHP application demonstrating dynamic features

// Get environment variables from Convox
$app_name = getenv('APP') ?: 'Local Development';
$rack_name = getenv('RACK') ?: 'Local';
$service_name = getenv('SERVICE') ?: 'web';

// Simple routing
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

// Set JSON response header for API endpoints
if (strpos($path, '/api') === 0) {
    header('Content-Type: application/json');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convox PHP Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>PHP on Convox</h1>
            <p class="subtitle">Dynamic Web Application Example</p>
        </header>
        
        <main>
            <?php
            // Simple routing system
            switch($path) {
                case '/':
                    include 'pages/home.php';
                    break;
                case '/info':
                    include 'pages/info.php';
                    break;
                case '/api/status':
                    include 'pages/api_status.php';
                    exit;
                case '/api/time':
                    include 'pages/api_time.php';
                    exit;
                default:
                    include 'pages/404.php';
            }
            ?>
        </main>
        
        <footer>
            <p>Running on <?php echo htmlspecialchars($rack_name); ?> | 
               App: <?php echo htmlspecialchars($app_name); ?> | 
               Service: <?php echo htmlspecialchars($service_name); ?></p>
            <p><a href="https://docs.convox.com">Documentation</a> | <a href="https://console.convox.com">Console</a></p>
        </footer>
    </div>
</body>
</html>