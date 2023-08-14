                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                    
                    <div class="row justify-content-left">
                            <?php foreach($users as $u): ?>
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters p-2">
                                        <div class="col-md-4">
                                        <img src="<?= base_url('assets/img/') . $u['image']; ?>" alt="..." class="card-img">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $u['name']; ?></h5>
                                            <p class="card-text"><?= $u['email']; ?></p>
                                            <p class="card-text"><small class="text-muted">Member Sejak <?= date('d F Y', $u['date_created']) ?></small></p>
                                            <a href="<?= base_url('admin/ubahuser/') . $u['id']; ?>" class="card-link">Ubah Data</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                <!-- /.container-fluid -->