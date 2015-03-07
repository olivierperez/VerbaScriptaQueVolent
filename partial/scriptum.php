<?php
use ScriptaVolent\service\ScriptaService;
use ScriptaVolent\Utils;

// Service
//--------
$scriptaService = new ScriptaService();

// Page
//-----
$id = filter_var($id, FILTER_VALIDATE_INT);
$ref = filter_var($ref, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_REF]]);

if (!empty($id) && !empty($ref)) {
    $scripta = $scriptaService->findScripta($id, $ref);

    if ($scripta) {
        echo '
<h1>Scriptum</h1>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">' . Utils::htmlEscape($scripta->title) . '</h3>
            </div>
            <div class="panel-body">
                ' . Utils::htmlEscape($scripta->content) . '
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Title</strong>
                <p class="list-group-item-text">' . Utils::htmlEscape($scripta->title) . '</p>
            </div>
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Creation</strong>
                <p class="list-group-item-text">' . Utils::htmlEscape($scripta->creation) . '</p>
            </div>
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Destruction</strong>
                <p class="list-group-item-text">' . Utils::htmlEscape($scripta->destruction) . '</p>
            </div>
        </div>
    </div>
</div>
';
    } else {
        http_response_code(404);
        echo '<h1>Not found</h1>';
    }
}