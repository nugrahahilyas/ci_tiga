</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Project Dummy Hilyas Riza Nugraha <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin mau Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih tombol keluar untuk keluar atau pilih tombol batal untuk batal</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <script>

        // bagian tulisan edit profil agar ada tulisan diatasnya
        $('.custom-file-input').on('change', function(){

            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);

        });




        $('.form-check-input').on('click', function(){
            const menuId = $(this).data('menu');
            const roleId = $(this).data('akses');
        
        $.ajax({
            url: "<?= base_url('admin/simpanakses'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function(){
                document.location.href = "<?= base_url('admin/ubahakses/'); ?>" + roleId;
            }
        });
        
        });

    </script>

<!-- jquery di halaman tambahBuku -->

<script>
  $(document).ready(function () {
    $('#combopenerbit').change(function () {
      var selectedValue = $(this).val();
      var lastBukuId = <?= end($buku)['id']; ?>;
      $('#id_buku').val(selectedValue + lastBukuId );
    });
  });
</script>
<!-- end jquery di halaman tambahBuku -->


<!-- jquery untuk input currency -->
<script>
    $(document).ready(function () {
        $('#harga').on('input', function () {
            let inputVal = $(this).val().replace(/[^\d]/g, '');
            if (inputVal === '') {
                $('#labelharga').text('');
            } else {
                let formatted = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,  // Menetapkan jumlah digit desimal minimum
                    maximumFractionDigits: 0   // Menetapkan jumlah digit desimal maksimum
                }).format(parseInt(inputVal));
                $('#labelharga').text(formatted);
            }
        });
    });
</script>
<!-- end jquery untuk currency -->

<!-- untuk kolom diskon -->
<script>
    $(document).ready(function () {
        $('#diskon').on('input', function () {
            let inputVal = $(this).val().replace(/[^\d]/g, '').substr(0, 2);
            $(this).val(inputVal);
        });
    });
</script>
<!-- end kolom diskon -->


</body>

</html>