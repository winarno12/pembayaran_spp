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
        <div class="col-md-12 mt-4 px-3">
            <h6 class="page-title h5">
                Daftar Kelas <small class="text-success h7">Kelola Kelas</small>
            </h6>

            <div class="card bg-transparent border-info ">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-11">
                            Daftar
                        </div>
                        <div class="col-md-1 float-right">
                            <i class="">
                                <a href="<?= base_url('kelas/tembah_kelas'); ?>" class="btn btn-outline-primary">Tambah</a>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-full-width" id="myTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Kelas</th>
                                <th>Komepetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($kelas == null) : ?>
                                <tr>
                                    <td colspan="4">Data Kelas Kosong</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1;
                                foreach ($kelas as $val) :

                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $val['nama_kelas']; ?></td>
                                        <td><?= $val['kompetensi_keahlian']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>" class="btn btn-danger">Hapus</a>
                                            <a href="<?= base_url(); ?>" class="btn btn-primary">Ubah</a>
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