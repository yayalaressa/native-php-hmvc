<?php
if (!defined('BASEPATH')) die('Access Denied!');

function error($code, $message)
{
    ob_end_clean();
    header("HTTP/1.0 {$code} {$message}", true, $code);
    die($message);
}

function view($view, $data = '', $return = FALSE) {
    ob_start();

    if(is_array($data)) {
        extract($data);
    }

    include BASEPATH . $view . '.php';

    $output = ob_get_contents();
    ob_end_clean();

    if($return !== FALSE) {
        return $output;
    } else {
        echo $output;
    }
}