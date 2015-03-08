<?php
namespace ScriptaVolent\Api;

use ScriptaVolent\service\ScriptaService;
use ScriptaVolent\Utils;

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
            $scriptum->label = substr(filter_var($scriptum->title, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_LABEL]]), 0, 255);
            $scriptum->destruction = filter_var($scriptum->destruction, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_DATE]]);
            // TODO clean $scriptum->content input

            if (!empty($scriptum->title) && !empty($scriptum->content)) {
                $scriptum = $this->scriptaService->createScriptum($scriptum);
                $scriptum->url = Utils::directLink($scriptum);
                echo json_encode($scriptum);
                http_response_code(201);
            }
        }
    }

}
