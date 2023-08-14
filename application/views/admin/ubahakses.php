                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                            
                            <?= $this->session->flashdata('message'); ?>

                            <h5 class="pb-3">
                              Akses anda sebagai : <?= $akses['role']; ?>
                            </h5>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($menu as $m) : ?>
                                        <tr>
                                        <th scope="row"><?= $i; ?></th>
                                            <td><?= $m['menu']; ?></td>
                                            <td>   
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                 type="checkbox"
                                                 <?= check_access($akses['id'], $m['id']); ?>
                                                 data-akses="<?= $akses['id']; ?>"
                                                 data-menu="<?= $m['id']; ?>"
                                                 >
                                            </div>
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