<?php
session_start();

if (!isset($_SESSION['id_membru'])) {
    header('Location: login.php');
    exit;
}


include_once '../config/parametros_db.php';
include_once 'autentication/connection.php';
include_once 'controller/get_table.php';

$get_table = new gestaoTabelas(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>POS-LS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="./main.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include('layout/header.php') ?>
        <div class="app-main">
            <div class="app-main__inner">
                <?php include('content/kliente/kliente.php') ?>
            </div>
        </div>
    </div>
    <?php include('content/kliente/modal.php') ?>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>