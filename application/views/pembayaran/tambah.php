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
                        <input type="text" id="id_spp" value="<?= $siswa['id_spp'] ?>" autocomplete="off" class="form-control" name="id_spp" />
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="tgl_pembayaran">Tanggal Pembayaran:</label>
                                <input type="text" id="tgl_pembayaran" value="<?= date('d-m-Y') ?>" autocomplete="off" class="form-control" name="tgl_pembayaran" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nisn">NISN:</label>
                                <input type="number" value="<?= $siswa['nisn'] ?>" id="nisn" autocomplete="off" class="form-control" name="nisn" />
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
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="jumlah_dibayar">Jumlah Harus Dibayar:</label>
                                <input type="text" name="jumlah_dibayar" value="<?= konversi_uang($siswa['nominal']); ?>" id="jumlah_dibayar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="tahun_dibayar">Tahun Dibayar:</label>
                                <select class="form-select" name="tahun_dibayar" aria-label="Default select example">
                                    <?php $tahun_terbit = date('Y');
                                    for ($i = $tahun_terbit - 1; $i <= $tahun_terbit + 1; $i++) {
                                        echo " <option value=$i>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="bulan_dibayar">Bulan Dibayar:</label>
                                <?php echo form_dropdown('bulan_dibayar', $bulan, set_value('bulan_dibayar'), 'id="bulan_dibayar" class="form-control select2me" '); ?>
                                <?= form_error('bulan_dibayar', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>