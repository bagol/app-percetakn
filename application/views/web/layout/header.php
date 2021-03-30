<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Dream Printing</title>
    <link href="<?= base_url('assets/template') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/css/price-range.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/css/animate.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/css/main.css" rel="stylesheet">
    <link href="<?= base_url('assets/template') ?>/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?= base_url('assets/template') ?>/js/html5shiv.js"></script>
    <script src="<?= base_url('assets/template') ?>/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?= base_url('assets/template') ?>/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="<?= base_url('assets/template') ?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="<?= base_url('assets/template') ?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="<?= base_url('assets/template') ?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="<?= base_url('assets/template') ?>/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +62 823-1271-5208</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> customer@dreamprinting.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="<?= base_url() ?>"><img src="<?= base_url('assets') ?>/images/logo-asli.png"
                                    alt="Dream Printing" width="200px" /></a>
                        </div>
                        <div class="btn-group pull-right clearfix">

                        </div>
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li><a href="<?= base_url("web/login") ?>"><i class="fa fa-lock"></i> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?= base_url() ?>" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Products</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Cart</a></li>
                                        <li><a href="<?= base_url("web/login") ?>">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url("web/contact") ?>">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->