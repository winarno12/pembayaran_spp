<div class="row">
    <div class="container">
        <div class="col-md-12 mt-4 px-3">
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
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama_kelas">Nama Siswa:</label>
                        <input type="text" id="nama_kelas" autocomplete="off" class="form-control" name="nama_kelas" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nisn">NISN:</label>
                                <input type="text" id="nisn" autocomplete="off" class="form-control" name="nisn" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nis">NIS:</label>
                                <input type="text" id="nis" autocomplete="off" class="form-control" name="nis" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="kelas">Kelas:</label>
                            <?php echo form_dropdown('shirts', $options, 'large');
                            ?>
                        </div>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="kompetensi_keahlian">Kompetensi Keahlian:</label>
                        <input type="text" autocomplete="off" id="kompetensi_keahlian" name="kompetensi_keahlian" class="form-control" />
                        <?= form_error('kompetensi_keahlian', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row text-end">
                        <div class="">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>