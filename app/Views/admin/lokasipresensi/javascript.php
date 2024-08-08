<?= $this->section('scripts') ?>
<script>
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
    })

    var map = L.map('map').setView([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>]).addTo(map);
</script>
<?= $this->endSection() ?>