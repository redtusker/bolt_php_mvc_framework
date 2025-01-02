<?php

use Core\Session;
use Src\Services\SmartyService;
global $router;

$router->get('/', 'welcome');
$router->get('/test', function () {
    echo "Welcome to the home page!";
});
$router->get('/smarty', function () {
    $smarty = new SmartyService();

    $smarty->assign('pageTitle', 'Welcome to My Website');
    $smarty->assign('message', 'This is the homepage!');

    // Display the template
    $smarty->display('home.tpl');
});
