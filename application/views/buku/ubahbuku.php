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
                                <?php foreach($penerbit as $p) : ?>
                                    <?php if ($p['id_penerbit'] == $buku['id_penerbit']) : ?>
                                        <option value="<?= $p['id_penerbit']; ?>" selected><?= $p['nama_penerbit']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $p['id_penerbit']; ?>"><?= $p['nama_penerbit']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>

                            </div>
                            <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_buku" id="id_buku" value="<?= $buku['id_buku']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="judul_buku" placeholder="Masukan Judul Buku" value="<?= $buku['judul_buku']; ?>">
                                <?= form_error('judul_buku','<small class="text-danger pl-3">','</small'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="penulis" placeholder="Masukan Nama Penulis" value="<?= $buku['penulis']; ?>">
                                <?= form_error('penulis','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="number" class="form-control" name="harga" placeholder="Masukan Harga Buku" id="harga" value="<?= $buku['harga']; ?>">
                                </div>
                                <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <label id="labelharga" for="harga" class="ml-5"></label>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                    <input type="number" class="form-control" id="diskon" name="diskon" min="0" max="99" step="1" placeholder="Diskon" value="<?= $buku['diskon']; ?>">
                                </div>
                                <?= form_error('diskon','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="stok" placeholder="Masukan Stok Buku" value="<?= $buku['stok']; ?>">
                            </div>
                            <?= form_error('stok','<small class="text-danger pl-3">','</small>'); ?>
                            <div class="form-group">
                                <button class="btn btn-bgstel bgstel btn-user btn-block text-light mt-3 float-right" type="submit">Ubah Data Buku</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

   