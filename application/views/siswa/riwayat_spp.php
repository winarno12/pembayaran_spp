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
</head>

<body>
    <style>
        th {
            font-size: 14px !important;
            font-weight: bold !important;
            text-align: center !important;
            margin: 0 auto;
            vertical-align: middle !important;
        }

        td {
            font-size: 12px !important;
            font-weight: normal !important;
            text-align: center !important;
        }

        select {
            display: inline-block;
            padding: 4px 6px;
            margin-bottom: 0px !important;
            font-size: 14px;
            line-height: 20px;
            color: #555555;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        label {
            display: inline !important;
            width: 50% !important;
            margin: 0 !important;
            padding: 0 !important;
            vertical-align: middle !important;
        }
    </style>
    <div class="row">
        <div class="container">
            <div class="col-md-12 col-lg-12 col-xl-12 mt-4 px-4">
                <h6 class="page-title h5">
                    Riwayat Pembayaran SPP
                </h6>
                <div class="card bg-transparent border-info ">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-11">
                                Daftar
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-full-width" id="myTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tanggal / Bulan</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pembayaran == null) : ?>
                                        <tr>
                                            <td colspan="5">Belum Ada Riwayat Pembayaran</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php $no = 1;
                                        foreach ($pembayaran as $val) :

                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $val['nama']; ?></td>
                                                <td><?= $val['nama_kelas']; ?></td>
                                                <td><?= $val['bulan_dibayar']; ?>/<?= $val['tahun_dibayar']; ?></td>
                                                <td><?= konversi_uang($val['jumlah_bayar']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?> "></script>
<!-- CUSTOM SCRIPTS  -->
<!-- <script src="<?= base_url('assets/js/custom.js'); ?> "></script> -->

<script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/datatables/js/dataTables.bootstrap5.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>