<?php
if (!defined('BASEPATH')) die('Access Denied!');

$router->mount('/welcome', function() use($router, $app) {

    $router->get('/', function() use($app) {
        echo "Router /welcome";
        $app->model('welcome_model');
        $app->welcome_model->hello();
    });

});