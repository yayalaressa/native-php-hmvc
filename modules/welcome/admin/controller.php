<?php
if (!defined('BASEPATH')) die('Access Denied!');

$router->mount('/welcome', function() use($router, $admin) {

    $router->get('/dashboard', function() use($admin) {
        $admin->model('welcome_model');
        $data['message'] = $admin->welcome_model->hello();
        $admin->render('welcome_view', $data);
    });

});
