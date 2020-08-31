<!DOCTYPE html>
<html>
    <head>
        <title>어학당 채점 프로그램</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8"/>

        <link rel="icon" type="image/ico" href="/assets/images/favicon.ico"/>
        <!-- Bootstrap -->
        <link href="/assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link
            href="/assets/css/font-awesome.min.css"
            rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/vendor/animate/animate.css">
        <link
            type="text/css"
            rel="stylesheet"
            media="all"
            href="/assets/js/vendor/mmenu/css/jquery.mmenu.all.css"/>
        <link
            rel="stylesheet"
            href="/assets/js/vendor/videobackground/css/jquery.videobackground.css">
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap-checkbox.css">
        <link
            rel="stylesheet"
            href="/assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">

        <link rel="stylesheet" href="/assets/js/vendor/chosen/css/chosen.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/chosen/css/chosen-bootstrap.css">
        <link
            rel="stylesheet"
            href="/assets/js/vendor/datatables/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="/assets/js/vendor/datatables/css/ColVis.css">
        <link rel="stylesheet" href="/assets/js/vendor/datatables/css/TableTools.css">

        <link href="/assets/css/minimal.css" rel="stylesheet">
        <link href="/assets/css/other.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script
        src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="solid-bg-6">

<!-- Preloader -->
<div class="mask">
    <div id="loader"></div>
</div>
<!--/Preloader -->

<!-- Wrap all page content here -->
<div id="wrap">

    <!-- Make page fluid -->
    <div class="row">

        <!-- Fixed navbar -->
        <div
            class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top"
            role="navigation"
            id="navbar">

            <!-- Branding -->
            <div class="navbar-header col-md-2">
                <div class="navbar-brand">
                    <strong>어학당</strong> 채점 프로그램
                </div>
                <!-- <div class="sidebar-collapse">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                </div> -->
            </div>
            <!-- Branding end -->

            <!-- .nav-collapse -->
            <div class="navbar-collapse">
                <!-- Quick Actions -->
                <ul class="nav navbar-nav quick-actions">

                    <li class="dropdown divided user" id="current-user">
                        <!-- <div class="profile-photo">
                            <img src="/assets/images/eum/sec1_toplogo.png" alt="alt"/>
                        </div> -->
                        <a class="dropdown-toggle options" data-toggle="dropdown" href="#">
                            <?php 
                            //print_r($this->session->userdata());
                            // if ( @$this->session->userdata('logged_in') == TRUE) {
                            //     echo @$this->session->userdata('name');
                            // } else {
                            //     echo '';
                            // }
                            ?> 관리자 님 환영합니다.
                            <i class="fa fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu arrow settings">

                            <li>
                                <a href="#" id="logoutBtn">
                                    <i class="fa fa-power-off"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /Quick Actions -->

                <!-- Sidebar -->
                <ul class="nav navbar-nav side-nav" id="sidebar">

                    <li class="collapsed-content">
                        <ul>
                            <li class="search">
                                <!-- Collapsed search pasting here at 768px -->
                            </li>
                        </ul>
                    </li>

                    <li class="navigation" id="navigation">

                        <ul class="menu">
                            <li class="">
                                <a href="/admin/dashboard">
                                <i class="a fa fa-bar-chart-o"></i> Dashboard
                                <span class="badge badge-red">1</span>
                                </a>
                            </li>
                            
                            <!-- <li class="">
                                <a href="/admin/notice_list">
                                <i class="a fa fa-bell"></i> 공지사항
                                <span class="badge badge-red">3</span>
                                </a>
                            </li> -->

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-pencil"></i>
                                    시험 관리
                                    <b class="fa fa-plus dropdown-plus"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/examList">
                                            <i class="fa fa-caret-right"></i>
                                            시험 관리
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/paperList">
                                            <i class="fa fa-caret-right"></i>
                                            시험지 관리
                                        </a>
                                    </li>
                                </ul>

                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-eye media-object"></i>
                                    채점자 관리
                                    <b class="fa fa-plus dropdown-plus"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/markerList">
                                            <i class="fa fa-caret-right"></i>
                                            채점자 관리
                                        </a>
                                    </li>
                                </ul>

                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-users media-object"></i>
                                    학생 관리
                                    <b class="fa fa-plus dropdown-plus"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/studentList">
                                            <i class="fa fa-caret-right"></i>
                                            학생 관리
                                        </a>
                                    </li>
                                </ul>

                                <li class="">
                                <a href="/admin/reportView">
                                <i class="a fa fa-file"></i> 보고서
                                </a>
                                </li>
                                
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-desktop"></i>
                                    설정
                                    <b class="fa fa-plus dropdown-plus"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/admin/portfoliopassword">
                                            <i class="fa fa-caret-right"></i>
                                            정보수정
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            </li>
                        </ul>

                    </li>

                </ul>
                <!-- Sidebar end -->

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- Fixed navbar end -->
