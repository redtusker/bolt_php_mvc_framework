<?php

use Core\Session;
global $router;

$router->get('/', 'welcome');
$router->get('/test', function () {
    echo "Welcome to the home page!";
});
