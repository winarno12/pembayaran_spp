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
                        <?php var_dump($siswa) ?>
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
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>