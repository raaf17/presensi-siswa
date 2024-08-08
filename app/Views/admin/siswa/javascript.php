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
    });
</script>
<?= $this->endSection() ?>