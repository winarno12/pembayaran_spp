<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pembayaran spp</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- css style -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?= base_url('petugas'); ?>">Admin Login</a></li>
                            <li><a href="<?= base_url('siswa/login'); ?>">User Login</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?= $this->session->flashdata('pesan') ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN LOGIN FORM</h4>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?= form_open(); ?>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    LOGIN FORM
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="" name="username" autocomplete="off" value="" />
                                        <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" autocomplete="off" />
                                        <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-info">Login</button>
                                </div>
                                <?= form_close() ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>