                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                            
                            <?= form_error('menu',
                                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>',
                                            '</strong></div>'); ?>
                            
                            <?= $this->session->flashdata('message'); ?>

                            <a href="" 
                            class="btn btn-primary mb-3"
                            data-toggle="modal"
                            data-target="#formDataBaru"
                            >
                             Tambah Akses</a>
        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Akses</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($akses as $a) : ?>
                                        <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $a['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/ubahakses'); ?>/<?= $a['id']; ?>" class="badge badge-success">
                                                Akses
                                            </a>
                                            <a href="<?= base_url('admin/ubah'); ?>/<?= $a['id']; ?>" class="badge badge-warning">
                                                Ubah
                                            </a>
                                            <a href="<?= base_url('admin/hapus'); ?>/<?= $a['id']; ?>" class="badge badge-danger">
                                                Hapus
                                            </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="formDataBaru" tabindex="-1" aria-labelledby="formDataBaruLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formDataBaru">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php base_url('admin/akses'); ?>" >
        <div class="modal-body">
            <div class="form-group">
                <input name="menu" type="text" class="form-control" placeholder="Masukan Akses... ">
            </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>