{extends file='page.tpl'}

{block name=head}
    <!-- App JS -->
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
    <script type="text/javascript" src="/js/datepicker.js"></script>
    <script type="text/javascript" src="/js/novi_scripti.js"></script>
    <script type="text/javascript" src="/js/ace-min/ace.js"></script>
    <script type="text/javascript" src="/js/ace-min/ext-beautify.js"></script>
{/block}

{block name=main}
    <h1>{'New scriptum'|i18n}</h1>
    <form id="novi_scripti" action="../api.php?s=scriptum" method="post">

        <div class="row">
            <div class="col-md-8 form-group">
                <label for="content">{'Content'|i18n}</label>
                <input type="hidden" name="content" id="content"/>
                <pre id="editor" style="height:384px" class="form-control"></pre>
            </div>

            <div class="col-md-4 form-group">
                <label>{'Settings'|i18n}</label>

                <div class="input-group">
                    <label class="input-group-addon" for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" maxlength="255" required/>
                </div>

                <div class="input-group">
                    <label class="input-group-addon" for="publication">{'Publication date'|i18n}</label>
                    <input type="text" name="publication" id="publication" class="form-control datepicker"
                           maxlength="10" required/>
                </div>

                <div class="input-group">
                    <label class="input-group-addon" for="destruction">{'Destruction date'|i18n}</label>
                    <input type="text" name="destruction" id="destruction" class="form-control datepicker"
                           maxlength="10" required/>
                </div>

                <div class="input-group">
                    <label class="input-group-addon" for="onelife">{'Destroy after reading'|i18n}</label>

                    <div class="form-control">
                        <input type="checkbox" name="onelife" id="onelife" class="checkbox"/>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" value="{'Create'|i18n}" class="btn btn-primary btn-block"/>
    </form>
{/block}