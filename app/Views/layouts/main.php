<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>Presensi Siswa | <?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/node_modules/summernote/dist/summernote-bs4.css">

    <link rel="stylesheet" href="<?= base_url('template') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/assets/css/components.css">
    <?= $this->renderSection('stylesheets') ?>

    <!-- CDN Libraries Link -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php if ($title != 'Login' && $title != 'Lupa Password' && $title != 'Reset Password') : ?>
                <?php include('navbar.php') ?>
                <?php include('sidebar.php') ?>
            <?php endif ?>

            <!-- Main Content -->
            <?= $this->renderSection('content') ?>
            <!-- End Main Content -->
             
            <?php if ($title != 'Login' && $title != 'Lupa Password' && $title != 'Reset Password') : ?>
                <?php include('footer.php') ?>
            <?php endif ?>
        </div>
    </div>

    <!-- General JS Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="<?= base_url('template') ?>/node_modules/jquery/dist/jquery.min.js"></script> -->
    <script src="<?= base_url('template') ?>/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/tooltip.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/stisla.js"></script>

    <!-- JS Libraries -->
    <script src="<?= base_url('template') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/page/modules-datatables.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/page/forms-advanced-forms.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/page/bootstrap-modal.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url('template') ?>/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });

        $(function() {
            <?php if (session()->has('message')) : ?>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "<?= $_SESSION['message'] ?>"
                });
            <?php endif; ?>
        });

        $('.tombol-hapus').on('click', function() {
            var getLink = $(this).attr('href');

            Swal.fire({
                title: "Yakin mau hapus?",
                text: "data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            });

            return false;
        });

        $('.tombol-logout').on('click', function() {
            var getLink = $(this).attr('href');

            Swal.fire({
                title: "Anda ingin logout?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6E7881",
                confirmButtonText: "Logout"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            });

            return false;
        });
    </script>

    <!-- Template JS File -->
    <script src="<?= base_url('template') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/custom.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>