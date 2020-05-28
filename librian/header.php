<?php
$page=explode('/',$_SERVER['PHP_SELF']);
#$page=$page[count($page)-1];
 $page=end($page);
session_start();
require_once '../dbcon.php';

if(!isset(  $_SESSION['librian_login'])){

    header('location: login.php');
}


#nicher code ta diye profiler name ta show koraici
$librian_login=$_SESSION['librian_login'];

$data=mysqli_query($con,"SELECT * FROM `librian` WHERE `email` = '$librian_login'");

$librian_info=mysqli_fetch_assoc($data);








?>





<!doctype html>
<html lang="en" class="fixed left-sidebar-top">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>

    <!--load progress bar-->
    <script src="../asset/vendor/pace/pace.min.js"></script>
    <link href="../asset/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asset/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../asset/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../asset/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../asset/vendor/magnific-popup/magnific-popup.css">

    <!--dataTable-->
    <link rel="stylesheet" href="../asset/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asset/stylesheets/css/style.css">


</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="index.html" class="on-click">
                    <h3>Lms</h3>
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>

            <!--NOCITE HEADERBOX-->
            <div class="header-section hidden-xs" id="notice-headerbox">

                <!--alerts notices-->
                <div class="notice" id="alerts-notice">
                    <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                    <div class="dropdown-box basic">
                        <div class="drop-header">
                            <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                            <span class="badge x-danger b-rounded">7</span>

                        </div>
                        <div class="drop-content">
                            <div class="widget-list list-left-element list-sm">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                            <div class="text">
                                                <span class="title">8 Bugs</span>
                                                <span class="subtitle">reported today</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                            <div class="text">
                                                <span class="title">Error</span>
                                                <span class="subtitle">sevidor C down</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                            <div class="text">
                                                <span class="title">New Configuration</span>
                                                <span class="subtitle"></span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                            <div class="text">
                                                <span class="title">14 Task</span>
                                                <span class="subtitle">completed</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                            <div class="text">
                                                <span class="title">21 Menssage</span>
                                                <span class="subtitle"> (see more)</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="drop-footer">
                            <a>See all notifications</a>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
            </div>
            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="../asset/images/avatar/avatar_user.jpg" />
                    </div>
                    <div class="user-info">


                        <span class="user-name"><?=ucwords($librian_info['firstname']).' ' .ucwords($librian_info['lastname'])?></span>
                        <span class="user-profile">Admin</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->

                               <?php #menu gola active korlam?>
                            <li class="<?= $page == 'index.php' ? 'active-item' : ''?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>

                            <li class="<?=$page =='students.php'?'active-item':''  ?>"> <a href="students.php"><i class="fa fa-users" aria-hidden="true"></i><span>students</span></a></li>

                            <li class="has-child-item open-item  <?= $page == 'add-books.php' ? 'open-item' : ''?> <?= $page == 'manage-books.php' ? 'open-item' : ''?>">
                                <a><i class="fa fa-table" aria-hidden="true"></i><span>Books</span></a>
                                <ul class="nav child-nav level-1" style="">
                                    <li class="<?= $page == 'add-books.php' ? 'active-item' : ''?>"><a href="add-books.php">Add Books</a></li>
                                    <li class="<?= $page == 'manage-books.php' ? 'active-item' : ''?>"><a href="manage-books.php">Manage Books</a></li>

                                </ul>
                            </li>

                            <li class="<?= $page == 'issue-book.php' ? 'active-item' : ''?>"><a href="issue-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>

                            <li class="<?= $page == 'return-book.php' ? 'active-item' : ''?>"><a href="return-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>






                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- CONTENT -->
        <!-- ========================================================= -->
        <div class="content">