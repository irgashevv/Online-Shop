<?php

    include_once __DIR__ . "/../../common/src/Service/SecurityService.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP MVC</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
        <a href="/index.php" class="brand-link">
            <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">PHP MVC</span>
        </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/index.php?model=product&action=read" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                            <p> 
                                Товары 
                                    <i class="fas fa-angle-left right">
                                    </i> 
                            </p>
                    </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/index.php?model=product&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                            <p>
                                Добавление Товара
                            </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/index.php?model=product&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                            <p>
                                Список Товаров
                            </p>
                    </a>
                </li>
            </ul>
                </li>

                <li class="nav-item">
                    <a href="/index.php?model=category&action=read" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                            <p> 
                                Категории
                                    <i class="fas fa-angle-left right"></i>
                            </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/index.php?model=category&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Дабовление Категории
                                    </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/index.php?model=category&action=read" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Список Категории
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/index.php?model=shop&action=read" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                            <p>
                                Магазины
                                    <i class="fas fa-angle-left right"></i>
                            </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/index.php?model=shop&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Дабовление Магазина
                                    </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/index.php?model=shop&action=read" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Список Магазинов
                                    </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/index.php?model=news&action=read" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                            <p>
                               Новости
                                <i class="fas fa-angle-left right"></i>
                            </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/index.php?model=news&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Дабовление Новостей
                                    </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/index.php?model=news&action=read" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Список Новостей
                                    </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/index.php?model=order&action=read" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/index.php?model=order&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Create Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/index.php?model=order&action=read" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Order List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
    </aside>

     <?php endif ;?>