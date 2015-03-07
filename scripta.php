<?php
use ScriptaVolent\service\ScriptaService;

require 'inc/init.php';

// Service
//--------
$scriptaService = new ScriptaService();

// Page
//-----
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$ref = filter_input(INPUT_GET, 'ref', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_REF]]);

if (!empty($id) && !empty($ref)) {
    $scripta = $scriptaService->findScripta($id, $ref);

    if ($scripta) {
        echo 'ID: ' . $scripta->id . '<br/>';
        echo 'ref: ' . $scripta->ref . '<br/>';
        echo 'label: ' . $scripta->label . '<br/>';
        echo 'content: ' . $scripta->content . '<br/>';
    } else {
        echo 'Not found<br/>';
    }
}
echo '<a href="/">Accueil</a>';