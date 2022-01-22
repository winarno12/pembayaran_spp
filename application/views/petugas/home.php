<h3>home</h3>
<?= $this->session->flashdata('pesan') ?>
<a href="<?= base_url('petugas/logout'); ?>">logout</a>
<a href="<?= base_url('siswa'); ?>">siswa</a>
<a href="<?= base_url('petugas'); ?>">petugas</a>
<a href="<?= base_url('spp'); ?>">spp</a>
<a href="<?= base_url('pembayaran'); ?>">pembayaran</a>