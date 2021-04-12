<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin - Dream Printing</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="<?=base_url('assets/template-admin/')?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/template-admin/')?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/template-admin/')?>vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url('assets/template-admin/')?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/template-admin/')?>vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?=base_url('assets/template-admin/')?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?=base_url("Admin")?>">
                        <img class="align-content" src="<?=base_url("assets/")?>/images/logo-asli.png" alt="logo" width="200">
                    </a>
                </div>
                <div class="login-form">
                    <form action="<?=base_url('Auth/cekLogin')?>" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="surel" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                               
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/template-admin/') ?>/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/template-admin/') ?>/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('assets/template-admin/') ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/template-admin/') ?>/assets/js/main.js"></script>


</body>

</html>