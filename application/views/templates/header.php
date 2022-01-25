<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/datatables/css/dataTables.bootstrap5.css'); ?>">
    <style>
        li a:hover {
            background-color: #111;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('assets/img/fetchimage.jpg'); ?>" alt="pembayaran spp" style="width:20px;" class="rounded-pill">
            </a>
            <div class="float-end">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('petugas/home'); ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Data Master</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('kelas'); ?>">Kelas</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('spp'); ?>">SPP</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Siswa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pembayaran'); ?>">Pembayaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>