<?php
require 'inc/init.php';
?><!DOCTYPE html>
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>

<?php include 'partial/header.php'; ?>

<main class="container" role="main">

    <?php

    if ($_SERVER['REQUEST_URI'] === '/') {
        include 'partial/novi_scripti.php';
    } else if (preg_match('#^/(?:index.php/(\d+)/(\w+))?$#', $_SERVER['REQUEST_URI'], $result)) {
        $id = $result[1];
        $ref = $result[2];
        include 'partial/scriptum.php';
    }
    ?>

    <?php include 'partial/footer.php'; ?>

</main>

</body>
</html>