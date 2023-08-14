                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>
                                            <?= validation_errors(); ?>
                                </strong></div>
                            <?php endif; ?>
                            
                            <?= $this->session->flashdata('message'); ?>

                            <a href="" 
                            class="btn btn-primary mb-3"
                            data-toggle="modal"
                            data-target="#tambahDataSubmenu"
                            >
                             Tambah Submenu</a>
        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Aktif</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($subMenu as $sm) : ?>
                                        <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-warning">
                                                Edit
                                            </a>
                                            <a href="<?= base_url('menu/hapussubmenu'); ?>/<?= $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">
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
<div class="modal fade" id="tambahDataSubmenu" tabindex="-1" aria-labelledby="tambahDataSubmenuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDataSubmenu">Tambah Submenu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php base_url('menu/submenu'); ?>" >
        <div class="modal-body">
            <div class="form-group">
                <input name="title" type="text" class="form-control" placeholder="Masukan Nama Sub Menu... ">
            </div>
            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Pilih Menu...</option>
                    <?php foreach ($menu as $m ) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input name="url" type="text" class="form-control" placeholder="Masukan url... ">
            </div>
            <div class="form-group">
                <input name="icon" type="text" class="form-control" placeholder="Masukan kelas ikon... ">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                    <label for="is_active" class="form_check-label">Apakah Aktif?</label>
                </div>
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