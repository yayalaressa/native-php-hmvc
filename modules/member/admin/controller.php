<?php
if (!defined('BASEPATH')) die('Access Denied!');

$router->mount('/member', function() use($router, $admin) {

    $router->get('/add', function() use($admin) {
        echo "Router /admin/member/add";
        $admin->model('member_model');
        $admin->member_model->hello();
    });

});