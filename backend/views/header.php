<?php
    include_once __DIR__ . "/../../common/src/service/SecurityService.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель Администратора</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../dist/css/shop.css">
    <style>
        img {
            width: 100px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php if (SecurityService::isAuthorized()) : ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Панель Админ-а</span>
        </a>

    <div class="sidebar">
<?php
    include_once __DIR__ . '/site/menu.php';
?>
    </div>
    </aside>

<?php endif ;?>