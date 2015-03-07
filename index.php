<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Verba Scripta Que Volent</title>
    <link rel="icon" href="/favicon.ico">

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style -->
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/scripta.css">

    <!-- Bootstrap JS -->
    <script src="/vendor/components/jquery/jquery.min.js"></script>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- App JS -->
    <script src="/js/novi_scripti.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>

<?php include 'partial/header.php'; ?>

<main class="container" role="main">

    <h1>Novi scripti</h1>

    <form id="novi_scripti" action="api.php?s=scriptum" method="post">

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="20" cols="50" class="form-control vert"></textarea>
            </div>
            <div class="col-md-6 form-group">
                <label>Settings</label>

                <div class="input-group">
                    <label class="sr-only" for="label">Label</label>

                    <div class="input-group-addon" for="label">Label</div>
                    <input type="text" name="label" id="label" class="form-control"/>
                </div>
            </div>
        </div>

        <input type="submit" value="Create" class="btn btn-primary btn-block"/>
    </form>

    <?php include 'partial/footer.php'; ?>

</main>

</body>
</html>