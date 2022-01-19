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
                Daftar Siswa <small class="text-success h7">Kelola Siswa</small>
            </h6>
            <?= $this->session->flashdata('pesan');
            ?>

            <div class="card bg-transparent border-info ">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-11">
                            Daftar
                        </div>
                        <div class="col-md-1 float-right">
                            <i class="">
                                <a href="<?= base_url('siswa/tambah_siswa'); ?>" class="btn btn-outline-primary">Tambah</a>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-full-width" id="myTable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Kelas</th>
                                    <th>No Telp</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($siswa == null) : ?>
                                    <tr>
                                        <td colspan="4">Data Kelas Kosong</td>
                                    </tr>
                                <?php else : ?>
                                    <?php $no = 1;
                                    foreach ($siswa as $val) :

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $val['nama']; ?></td>
                                            <td><?= $val['nisn']; ?></td>
                                            <td><?= $val['nama_kelas']; ?></td>
                                            <td><?= $val['no_telp']; ?></td>
                                            <td><?= konversi_uang($val['nominal']); ?></td>
                                            <td>
                                                <a href="<?= base_url('siswa/hapussiswa/'); ?><?= $val['nisn']; ?>" onclick="return confirm('yakin?')" class="btn btn-danger">Hapus</a>
                                                <a href="<?= base_url('kelas/ubah_kelas/'); ?><?= $val['nisn']; ?>" class="btn btn-primary">Ubah</a>
                                            </td>
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