<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>Ambil Foto Selfie</h5>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="tanggal_keluar" name="tanggal_keluar" value="<?= $tanggal_keluar ?>">
                        <input type="hidden" id="jam_keluar" name="jam_keluar" value="<?= $jam_keluar ?>">
                        <div class="d-flex justify-content-center">
                            <div id="my_camera"></div>
                            <div style="display: none;" id="my_result"></div>
                        </div>
                        <button class="btn btn-danger mt-4" id="ambil-foto-keluar">Keluar</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 320,
        dest_height: 220,
        image_format: 'jpeg',
        jpeg_quality: 90,
        force_flash: false
    });

    Webcam.attach('#my_camera');

    document.getElementById('ambil-foto-keluar').addEventListener('click', function() {
        let tanggal_keluar = document.getElementById('tanggal_keluar').value;
        let jam_keluar = document.getElementById('jam_keluar').value;

        Webcam.snap(function(data_uri) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '" />';
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = '<?= site_url('siswa/home') ?>';
                }
            }

            xhttp.open("POST", '<?= site_url('siswa/presensikeluaraksi/' . $id_presensi) ?>', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(
                'foto_keluar=' + encodeURIComponent(data_uri) +
                '&tanggal_keluar=' + tanggal_keluar +
                '&jam_keluar=' + jam_keluar
            );
        })
    })
</script>
<?= $this->endSection() ?>