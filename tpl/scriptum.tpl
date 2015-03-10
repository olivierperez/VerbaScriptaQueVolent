{extends file='page.tpl'}

{block name=head}
{/block}

{block name=main}
    <h1>Scriptum</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{$scriptum->title|html}</h3>
                </div>
                <div class="panel-body">
                    {if $scriptum->onelife}
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> This text will destroy itself after reading.</div>
                    {/if}
                    {$scriptum->content|markdown}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <div class="list-group-item">
                    <strong class="list-group-item-heading"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> {'Title'|i18n}</strong>
                    <p class="list-group-item-text">{$scriptum->title|html}</p>
                </div>
                <div class="list-group-item">
                    <strong class="list-group-item-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> {'Creation'|i18n}</strong>
                    <p class="list-group-item-text">{$scriptum->creation|html}</p>
                </div>
                <div class="list-group-item">
                    <strong class="list-group-item-heading"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {'Publication'|i18n}</strong>
                    <p class="list-group-item-text">{$scriptum->publication|html}</p>
                </div>
                <div class="list-group-item">
                    <strong class="list-group-item-heading"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> {'Destruction'|i18n}</strong>
                    <p class="list-group-item-text">{$scriptum->destruction|html}</p>
                </div>
                <div class="list-group-item">
                    <strong class="list-group-item-heading"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> {'Share link'|i18n}</strong>
                    <p class="list-group-item-text"><a href="{$scriptum|directLink}">{$scriptum|directLink}</a></p>
                </div>
            </div>
        </div>
    </div>
{/block}