<h1>Novi scripti</h1>

<form id="novi_scripti" action="../api.php?s=scriptum" method="post">

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="20" cols="50" class="form-control vert" required></textarea>
        </div>
        <div class="col-md-6 form-group">
            <label>Settings</label>

            <div class="input-group">
                <label class="input-group-addon" for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" maxlength="255" required/>
            </div>

            <div class="input-group">
                <label class="input-group-addon" for="destruction">Destruction date</label>
                <input type="text" name="destruction" id="destruction" class="form-control datepicker" maxlength="10" required/>
            </div>
        </div>
    </div>

    <input type="submit" value="Create" class="btn btn-primary btn-block"/>
</form>

<!-- App JS -->
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
<script src="/js/datepicker.js"></script>
<script src="/js/novi_scripti.js"></script>