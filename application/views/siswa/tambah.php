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
                                <a href="<?= base_url('kelas'); ?>" class=" btn btn-outline-primary">kembali</a>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama_siswa">Nama Siswa:</label>
                        <input type="text" id="nama_siswa" value="<?= set_value('nama_siswa'); ?>" autocomplete="off" class="form-control" name="nama_siswa" />
                        <?= form_error('nama_siswa', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nisn">NISN:</label>
                                <input type="number" value="<?= set_value('nisn'); ?>" id="nisn" autocomplete="off" class="form-control" name="nisn" />
                                <?= form_error('nisn', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nis">NIS:</label>
                                <input type="number" id="nis" autocomplete="off" class="form-control" name="nis" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="kelas">Kelas:</label>
                                <?php echo form_dropdown('category_id', $kelas, set_value('category_id'), 'id="book_category_id" class="form-control select2me" onChange="function_elements_add(this.name, this.value);" '); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="id_spp">SPP:</label>
                                <select name="id_spp" class="form-control" id="id_spp">
                                    <?php foreach ($spp as $val) : ?>
                                        <option value=""><?= $val['id_spp']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="kompetensi_keahlian">No Telp:</label>
                        <input type="number" autocomplete="off" id="no_telp" name="no_telp" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="kompetensi_keahlian">Alamat:</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
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