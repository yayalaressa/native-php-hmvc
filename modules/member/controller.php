<?php
if (!defined('BASEPATH')) die('Access Denied!');

$router->mount('/member', function() use($router, $admin) {

    $router->get('/login', function() use($admin) {
        echo "Router /member/login";
        $admin->model('member_model');
        $admin->member_model->hello();
    });

});
