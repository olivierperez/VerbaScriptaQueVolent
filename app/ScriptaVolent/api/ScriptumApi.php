<?php
namespace ScriptaVolent\Api;

use ScriptaVolent\service\ScriptaService;

class ScriptumApi implements Api {

    // Services
    //---------
    private $scriptaService;

    function __construct() {
        $this->scriptaService = new ScriptaService();
    }

    function onPost() {
        if (!empty($_POST['scriptum'])) {
            $scriptum = json_decode($_POST['scriptum']);
            $scriptum->label = filter_var($scriptum->label, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_LABEL]]);
            // TODO clean $scriptum->content input

            if (!empty($scriptum->label) && !empty($scriptum->content)) {
                $scriptum = $this->scriptaService->createScriptum($scriptum);
                echo json_encode($scriptum);
                http_response_code(201);
            }
        }
    }

}
