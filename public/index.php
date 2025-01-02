<?php

phpinfo();


define('BOLT_START', microtime(true));

// Register the Composer autoloader...
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

use Src\Core\Router;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/src');
define('PUBLIC_PATH', BASE_PATH . '/public');

// Load environment variables
if (file_exists(BASE_PATH . '/.env')) {
    $dotenv = Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();
}

// Error handling
error_reporting(E_ALL);
ini_set('display_errors', getenv('APP_DEBUG') === 'true' ? '1' : '0');

// Initialize Router
$router = new Router();
require_once BASE_PATH . '/routes/web.php';
$router->dispatch($_SERVER['REQUEST_URI']);
