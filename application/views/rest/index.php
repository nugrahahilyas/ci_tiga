                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">NIM</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Umur</th>
                          <th scope="col">Lulus</th>
                        </tr>
                      </thead>
                        <tbody>
                            <?php $i = 0; ?>
                        <?php foreach($mahasiswa as $mhs) : ?>
                        <tr>
                        <th scope="row"><?= $i+1; ?></th>
                        <td><?= $mhs['nim']; ?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['umur']; ?></td>
                        <td><?= $mhs['lulus']; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.container-fluid -->