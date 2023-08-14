                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                    
                    
                    <div class="row">
                        <div class="col-lg-6">

                            <?= $this->session->flashdata('message'); ?>
                            
                            <form action="<?= base_url('user/gantisandi'); ?>" method="post">
                            <div class="form-group">
                                <input type="password" class="form-control" name="currentpassword" placeholder="Masukan Sandi Lama" autofocus>
                                <?= form_error('currentpassword','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordbaru1" placeholder="Masukan Sandi Baru">
                                <?= form_error('passwordbaru1','<small class="text-danger pl-3">','</small'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordbaru2" placeholder="Ulang Sandi Baru">
                                <?= form_error('passwordbaru2','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Ubah Password!</button>
                            </div>

                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->