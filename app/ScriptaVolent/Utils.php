<?php
namespace ScriptaVolent;

class Utils {

    function __construct() {}

    public static function debug($object) {
        echo '<pre>' . print_r($object, true) . '</pre>';
    }

    public static function htmlEscape($html) {
        return htmlentities($html, ENT_HTML5 | ENT_QUOTES);
    }

}
