<!-- Begin Page Content -->
<div class="container-fluid">

  
  
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
  <div class="row">
    <div class="col-md-2">
      <a href="<?= base_url('penerbit/tambahpenerbit'); ?>" class="btn btn-bgstel bgstel btn-user btn-block text-light mb-3">Tambah Penerbit</a>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <?php if ($this->session->flashdata('message')): ?>
              <?= $this->session->flashdata('message'); ?>
      <?php endif; ?>
    </div>
  </div>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Penerbit</th>
      <th scope="col">Nama Penerbit</th>
      <th scope="col">No HP</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jumlah Stok</th>
      <th scope="col">Omset</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach($penerbit as $p) : ?>
    <tr>
    <th scope="row"><?= $i+1; ?></th>
    <td><?= $p['id_penerbit']; ?></td>
    <td><?= $p['nama_penerbit']; ?></td>
    <td><?= $p['no_hp']; ?></td>
    <td><?= $p['alamat']; ?></td>
    <td><?= $p['jumlah_stok']; ?></td>
    <td><?= number_format($p['omset'], 0, ',', '.'); ?></td>
    <td>
    <a href="<?= base_url('penerbit/ubahpenerbit'); ?>/<?= $p['id']; ?>" class="badge badge-success">
    Ubah
    </a>
    <!-- <a href="<?= base_url('penerbit/hapuspenerbit'); ?>/<?= $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda Yakin ?');">
    Hapus
    </a> -->
    </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
</table>

</div>
<!-- /.container-fluid -->

