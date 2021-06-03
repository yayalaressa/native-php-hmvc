<?php
if (!defined('BASEPATH')) die('Access Denied!');

// Create Router instance
$router = new \Bramus\Router\Router();

// Load class
$app = new App();
$admin = new Admin();

// Load router modules
foreach(glob(BASEPATH . 'modules/*/controller.php') as $controller) {
    if(file_exists($controller)) include_once($controller);
}

// Mount router admin
$router->mount('/admin', function() use($router, $admin) {

    // Load router modules admin
    foreach(glob(BASEPATH . 'modules/*/admin/controller.php') as $controller) {
        if(file_exists($controller)) include_once($controller);
    }

});

// Index
$router->get('/', function() use($app) {
    $app->model('welcome_model');
    $data['message'] = $app->welcome_model->hello();
    $app->render('welcome_view', $data);
});

$router->get('.*', function() {
    header('HTTP/1.1 404 Not Found');
    echo 'HTTP/1.1 404 Not Found';
});

// Run it!
$router->run();
