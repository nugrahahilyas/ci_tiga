<!-- Begin Page Content -->
<div class="container-fluid">

  
  
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
  <div class="row">
    <div class="col-md-2">
      <a href="<?= base_url('buku/tambahbuku'); ?>" class="btn btn-bgstel bgstel btn-user btn-block text-light mb-3">Tambah Buku Baru</a>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <?php if ($this->session->flashdata('message')): ?>
              <?= $this->session->flashdata('message'); ?>
      <?php endif; ?>
    </div>
  </div>

<div class="row justify-content-between">
  <div class="col-md-4">
    <form action="<?= base_url('buku'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Buku..." autofocus name="keyword" autocomplete="off">
          <div class="input-group-append">
          <button class="btn btn-bgstel bgstel btn-user btn-block text-light mb-3" type="submit" name="submit">Cari!</button>
          </div>
        </div>
    </form>
  </div>
  <div class="col-md-2">
    <?= $this->pagination->create_links(); ?>
  </div>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Buku</th>
      <th scope="col">Judul</th>
      <th scope="col">Penulis</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Harga</th>
      <th scope="col">Diskon</th>
      <th scope="col">Stok</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
    <tbody>
    <?php foreach($buku as $b) : ?>
    <tr>
    <th scope="row"><?= ++$start; ?></th>
    <td><?= $b['id_buku']; ?></td>
    <td><?= $b['judul_buku']; ?></td>
    <td><?= $b['penulis']; ?></td>
    <td><?= $b['nama_penerbit']; ?></td>
    <td><?= number_format($b['harga'], 0, ',', '.'); ?></td>
    <td><?= $b['diskon'] * 100; ?>%</td>
    <td><?= $b['stok']; ?></td>
    <td>
    <a href="<?= base_url('buku/ubahbuku'); ?>/<?= $b['id']; ?>" class="badge badge-success">
    Ubah
    </a>
    <a href="<?= base_url('buku/hapusbuku'); ?>/<?= $b['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda Yakin ?');">
    Hapus
    </a>
    </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- /.container-fluid -->

