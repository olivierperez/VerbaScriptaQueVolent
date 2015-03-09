<?php

require 'inc/init.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    $smarty->display('novi_scripti.tpl');
    //include 'partial/novi_scripti.php';
} else if (preg_match('#^/(?:index.php/(\d+)/(\w+))?$#', $_SERVER['REQUEST_URI'], $result)) {
    $id = $result[1];
    $ref = $result[2];
    include 'partial/scriptum.php';
} else {
    http_response_code(404);
    $smarty->display('404.tpl');
}

?>