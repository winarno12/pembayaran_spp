<div class="row">
    <div class="container">
        <div class="col-md-12 mt-4 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('kelas'); ?>">Daftar Kelas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Kelas</li>
                </ol>
            </nav>
            <h6 class="page-title h5">
                <small class="text-info h7">Ubah Kelas</small>
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
                    <?= form_open('kelas/proses_update') ?>
                    <input type="hidden" id="id_kelas" name="id_kelas" autocomplete="off" value="<?= $kelas['id_kelas']; ?>" class="form-control" />
                    <input type="hidden" id="old_kelas" name="old_kelas" autocomplete="off" value="<?= $kelas['nama_kelas']; ?>" class="form-control" />
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama_kelas">Nama Kelas:</label>
                        <input type="text" id="nama_kelas" autocomplete="off" value="<?= $kelas['nama_kelas']; ?>" class="form-control" name="nama_kelas" />
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="kompetensi_keahlian">Kompetensi Keahlian:</label>
                        <input type="text" autocomplete="off" value="<?= $kelas['kompetensi_keahlian']; ?>" id="kompetensi_keahlian" name="kompetensi_keahlian" class="form-control" />
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