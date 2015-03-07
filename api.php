<?php
use ScriptaVolent\Api\ScriptumApi;

require 'inc/init.php';

// Variables
//----------
$api = null;


// Select API

switch ($_GET['s']) {
    case 'scriptum' :
        $api = new ScriptumApi();
        break;
}

// Call right method

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $api->onPost();
        break;
}