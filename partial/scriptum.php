<?php
use ScriptaVolent\service\ScriptumService;
use ScriptaVolent\Utils;

// Service
//--------
$scriptaService = new ScriptumService();

// Page
//-----
$id = filter_var($id, FILTER_VALIDATE_INT);
$ref = filter_var($ref, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => REGEX_REF]]);

if (!empty($id) && !empty($ref)) {
    $scriptum = $scriptaService->read($id, $ref);

    if ($scriptum) {
        echo '
<h1>Scriptum</h1>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">' . Utils::htmlEscape($scriptum->title) . '</h3>
            </div>
            <div class="panel-body">';
                if ($scriptum->onelife) {
                    echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> This text will destroy itself after reading.</div>';
                }
                echo Utils::htmlEscape($scriptum->content) . '
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Title</strong>
                <p class="list-group-item-text">' . Utils::htmlEscape($scriptum->title) . '</p>
            </div>
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Creation</strong>
                <p class="list-group-item-text">' . Utils::htmlEscape($scriptum->creation) . '</p>
            </div>
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Destruction</strong>
                <p class="list-group-item-text">' . Utils::htmlEscape($scriptum->destruction) . '</p>
            </div>
            <div class="list-group-item">
                <strong class="list-group-item-heading"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Share link</strong>
                <p class="list-group-item-text"><a href="' . Utils::directLink($scriptum) . '">' . Utils::directLink($scriptum) . '</a></p>
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