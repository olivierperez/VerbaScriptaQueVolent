<?php
use ScriptaVolent\service\ScriptumService;
use ScriptaVolent\Utils;

// Service
//--------
$scriptumService = new ScriptumService();

// Page
//-----
$id = filter_var($id, FILTER_VALIDATE_INT);
$ref = filter_var($ref, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_REF]]);

if (!empty($id) && !empty($ref)) {
    $scriptum = $scriptumService->read($id, $ref);

    if ($scriptum) {
        $smarty->assign('scriptum', $scriptum);
        $smarty->display('scriptum.tpl');
    } else {
        http_response_code(404);
        $smarty->display('404.tpl');
    }
}