<!-- library untuk currency -->
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0/dist/autoNumeric.min.js"></script>
<!-- end library -->

<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                    
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" id="id" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_penerbit" id="id_penerbit" placeholder="Masukan Kode Penerbit">
                                <?= form_error('id_penerbit','<small class="text-danger pl-3">','</small'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_penerbit" placeholder="Masukan Nama Penerbit">
                                <?= form_error('nama_penerbit','<small class="text-danger pl-3">','</small'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor HP">
                                <?= form_error('no_hp','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Penerbit">
                                <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-bgstel bgstel btn-user btn-block text-light mt-3 float-right" type="submit">Tambah Data Penerbit</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

   