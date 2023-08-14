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
                            <select class="form-control" id="combopenerbit" name="id_penerbit">
                                <option value="">Pilih Penerbit</option>
                                <?php foreach($penerbit as $p) : ?>
                                    <option value="<?= $p['id_penerbit']; ?>"><?= $p['nama_penerbit']; ?></option>
                                <?php endforeach; ?>
                            </select>    
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_buku" id="id_buku" value="membuat id..." readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="judul_buku" placeholder="Masukan Judul Buku">
                                <?= form_error('judul_buku','<small class="text-danger pl-3">','</small'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="penulis" placeholder="Masukan Nama Penulis">
                                <?= form_error('penulis','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" class="form-control" name="harga" placeholder="Masukan Harga Buku" id="harga">
                                </div>
                                <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <label id="labelharga" for="harga" class="ml-5"></label>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                    <input type="number" class="form-control" id="diskon" name="diskon" min="0" max="99" step="1" placeholder="Diskon">
                                </div>
                                <?= form_error('diskon','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="stok" placeholder="Masukan Stok Buku">
                            </div>
                            <?= form_error('stok','<small class="text-danger pl-3">','</small>'); ?>
                            <div class="form-group">
                                <button class="btn btn-bgstel bgstel btn-user btn-block text-light mt-3 float-right" type="submit">Tambah Data Buku</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

   