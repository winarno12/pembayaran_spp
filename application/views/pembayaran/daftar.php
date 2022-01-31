<div class="row">
    <div class="container">
        <div class="col-md-12 mt-4 px-3">
            <?= $this->session->flashdata('pesan'); ?>
            <h6 class="page-title h5">
                <small class="text-info h7">Tambah Kelas</small>
            </h6>
            <div class="card bg-transparent border-info ">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-11 h5">
                            Daftar
                        </div>
                        <div class="col-md-1 float-right">
                            <i class="">
                                <a href="<?= base_url('kelas'); ?>" class=" btn btn-outline-primary">kembali</a>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                    <label for="">Masukan NISN:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="masukan NISN" aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off" name="nisn">
                        <div class="input-group-append">
                            <button id="search-button" type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <?= form_error('nisn', ' <small class="text-danger pl-3">', '</small>'); ?>
                    <?= form_close() ?>
                    <?php if ($this->input->post('nisn')) : ?>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        DETAIL SISWA
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= $siswa['nama']; ?></h5>
                                        <p class="card-text"><?= $siswa['nama_kelas']; ?></p>
                                        <p class="card-text"><?= $siswa['nisn']; ?></p>
                                        <a href="<?=base_url('pembayaran/tambahPembayaran')  ;?>" class="btn btn-primary">Tambah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="table-responsive px-2">
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
                                    <td colspan="5">Siswa</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1;
                                foreach ($pembayaran as $val) :

                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $val['nama']; ?></td>
                                        <td><?= $val['nama_kelas']; ?></td>
                                        <td><?=$bulan[$val['bulan_dibayar']] ; ?>/<?=$val['tahun_dibayar'] ;?></td>
                                        <td><?=konversi_uang($val['jumlah_bayar']) ; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    <?php endif; ?>
    </div>