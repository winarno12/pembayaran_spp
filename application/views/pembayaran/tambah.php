<div class="row">
    <div class="container">
        <div class="col-md-12 mt-4 px-3">
            <h6 class="page-title h5">
                <small class="text-info h7">Tambah Siswa</small>
            </h6>
            <div class="card bg-transparent border-info ">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-11 h5">
                            Daftar
                        </div>
                        <div class="col-md-1 float-right">
                            <i class="">
                                <a href="<?= base_url('siswa'); ?>" class=" btn btn-outline-primary">kembali</a>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nama_siswa">Tanggal Pembayaran:</label>
                                <input type="text" id="nama_siswa" value="<?= date('d-m-Y') ?>" autocomplete="off" class="form-control" name="nama_siswa" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nisn">NISN:</label>
                                <input type="number" value="<?= $siswa['nisn'] ?>" id="nisn" autocomplete="off" class="form-control" name="nisn" />
                                <?= form_error('nisn', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nis">Nama</label>
                                <input type="text" id="nis" value="<?= $siswa['nama'] ?>" autocomplete="off" class="form-control" name="nis" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="total_bayar">Jumlah Harus Diabayar:</label>
                                <input type="text" name="total_bayar" id="total_bayar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="total_bayar">Jumlah Harus Diabayar:</label>
                                <input type="text" name="total_bayar" value="" id="total_bayar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>