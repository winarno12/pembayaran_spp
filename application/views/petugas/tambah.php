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
                                <a href="<?= base_url('petugas/home'); ?>" class=" btn btn-outline-primary">kembali</a>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username:</label>
                        <input type="text" value="<?= set_value('username'); ?>" id="username" autocomplete="off" class="form-control" name="username" />
                        <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama_petugas">Nama Petugas:</label>
                        <input type="text" autocomplete="off" value="<?= set_value('nama_petugas'); ?>" id="nama_petugas" name="nama_petugas" class="form-control" />
                        <?= form_error('nama_petugas', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password:</label>
                        <input type="password" autocomplete="off" id="password" name="password" class="form-control" />
                        <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Level:</label>
                        <select class="form-select" name="level" aria-label="Default select example">
                            <option selected hidden>Open this select menu</option>
                            <?php foreach ($level as $val) : ?>
                                <option value="<?= $val; ?>"><?= $val; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('level', ' <small class="text-danger pl-3">', '</small>'); ?>
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