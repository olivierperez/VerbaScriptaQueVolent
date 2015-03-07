<h1>Novi scripti</h1>

<form id="novi_scripti" action="../api.php?s=scriptum" method="post">

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="20" cols="50" class="form-control vert"></textarea>
        </div>
        <div class="col-md-6 form-group">
            <label>Settings</label>

            <div class="input-group">
                <div class="input-group-addon">Title</div>
                <input type="text" name="title" id="title" class="form-control"/>
            </div>
        </div>
    </div>

    <input type="submit" value="Create" class="btn btn-primary btn-block"/>
</form>

<!-- App JS -->
<script src="/js/novi_scripti.js"></script>